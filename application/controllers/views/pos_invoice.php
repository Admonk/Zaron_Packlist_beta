<?php
error_reporting(0);
?>

<style type="text/css">
.rev_tab td{
    padding:8px;
    font-family:sans-serif;
    font-size:12px;
    
}
.main_head td{
    background: #f9f9f9;
         color: #232323;
         font-size: 11px;
         font-weight: bold;
}
.al_tr1 td{
    /*background: #fdf5e9;*/
}
.al_tr0 td{
   /* background: #fff5e9;*/
}

.total_tr{
    background:#2358A7;
    font-weight:bold;
    color:#fff;
    margin-bottom:20px;
}
.g_total_tr{
    background:#fff;
   
}
.g_total_tr td{
    font-size:12px;
}
.pay_total_tr{
    background:#F66;
    font-weight:bold;
    color:#000;
}
.stat_total_tr{
    background:#009;
    font-weight:bold;
    color:#fff;
}
.summary_head{
    font-weight:bold;
    font-size:15px;
}
.onlyprint{
    display:none;
}
.tbody tr td {
         border-right: 1px solid  #d6d6d6;
         border-collapse: collapse;
}
select {
    border-radius: 3px;
    padding: 8px;
    border-color: #dbdbdb;
}
input {

    border-radius: 3px;
    padding: 5px;
    
}
@media print
{    
    .onlyprint{
        display:table-row;
    }
    .no-print
    {
        display: none !important;
    }
    .rev_tab td{
        color:#000;
    }
    a:link:after, a:visited:after {
        content: "";
    }
     @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    
}
</style>
<script type="text/javascript" src="<?php echo assets; ?>js/libs/jquery-1.10.2.min.js"></script>
<title>Madhura - Invoice</title>
 <link rel="icon" href="https://admonk.in/madhura/files/assets/images/favicon.ico" type="image/x-icon">
<form action="#" id="add_appointment">
    
    
    <?php
  
    foreach($sales as $views)
    { 
       $order_id= $views->id;
       $discount= $views->discount;
       if($discount=='')
       {
           $discount=0;
       }
       $gst_visable= $views->gst_visable;
       $gst= $views->gst;
        $notes= $views->notes;
          $oder_date= $views->oder_date;
       $super_stock_id= $views->super_stock_id;
       $customer_name= $views->customer_name;
       $customer_phone= $views->customer_phone;
       $customer_address= $views->customer_address;
       $delivery_address="";
 $order_base= $views->order_base;


     
       $retail_store_id= $views->retail_store_id;

       $execute_name_id= $views->execute_name;
       $customer_phone= $views->customer_phone;
       $customer_address= $views->customer_address;







 $satatus="";
 $payment_status=0;
 if($views->payment_mode=='1')
 {
                                if($views->amount_cash!='')
                                {
                                    
                                   $satatus.="Cash";
                                   $satatus.= "<br>";
                                   $satatus.="Amount : Rs. ". $views->amount_cash;
                                }

                                $payment_status=$views->payment_status;

}
if($views->payment_mode=='5')
{
                               $satatus.="Other Transaction";
                               $satatus.="<br>";
                               $satatus.="Amount : Rs. ". $views->amount_card;
                               $satatus.="<br>";
                               $satatus.="Details : ". $views->card_number;
                               
                               
                              
     $payment_status=$views->payment_status;                          
                               
}

if($views->payment_mode=='3')
{
                               $satatus.="Payment Pending";
                               $satatus.="<br>";
                               $satatus.="Paid Amount : Rs. ". $views->amount_cash;
                               $satatus.=" Pending Amount : Rs. ". $views->pending_amount;
                               
                               
                               if($views->pending_amount==0)
                               {
                                   $payment_status=1; 
                               }
                               
}










    }
    
    
   
    
   
    
    ?>
    
    
    
    
<table align="center" width="800" cellpadding="0" cellspacing="0" class="rev_tab" border="yes" style="border: 1px solid #ababab;">
 
    <tr>
      <td align="left"  colspan="3">
          <div class="paddingset">
              
                        <p><b>SG INC.</b> </p>
                        <p>18-379/1, INDIRA NAGAR</p>

                        <p>SIRUMUGAI,</p>
                          <p>COIMBATORE-641302,</p>
                         <p>Ph No: 99445522338 </p>     
                         <p>Email: sgincglobal2020@gmail.com   </p>   
                         <p>GSTIN: 33AEHFS0796Q1ZA   </p>   
                         <p>State: 33- Tamil Nadu    </p> 
                        
                      
             </div>
        </td>
        
        <td align="right">


      <div class="paddingset">




                    <img src="<?php echo LOGO; ?>" style="width:155px;"> 
              
                    
                        
                      
             </div>


        </td>
    </tr>
    
    <tr>
      <td colspan="4" align="center" style="color: #0069c3;  font-weight: 800; font-size: 15px;">DELIVERY CHALLAN</td>
  
   
    </tr>








    <tr>
      <td align="left"  colspan="3">
          <div class="paddingset" >
              
                        <p><b>Delivery challan for:</b> </p>


                        <p><?php echo $customer_name; ?></p>
                        <p><?php echo $delivery_address; ?></p>
                        <p>Contact : <?php echo $customer_phone; ?></p>


                       <!--  <p>SG INC</p>
                        <p>1/562-4, Mudalipalayam</p>
                      
                         <p>Arasur PO,</p>     
                         <p>Coimbatore- 541407    </p>   
                         
                         <p>Contact: 9994408311   </p>  -->
                        
                      
             </div>
        </td>
       
        <td align="right">


      <div class="paddingset">



             <div class="paddingset">
              
                        <p>Challan No:  SG/<?php echo $order_id; ?>/<?php echo  date('Y'); ?> </p>
                        <p>Date: <?php echo  date('d-m-Y',strtotime($oder_date)); ?> </p>
                        
                         <?php 
                          if($order_base=='4')
                          {
                            ?>
 <p><b>Order  :</b> POS</p>
                            <?php
                          }

                         ?>

                          <?php 
                          if($order_base=='5')
                          {
                            ?>
 <p><b>Order  :</b> STAFF</p>
                            <?php
                          }

                         ?>


                          <?php 
                          if($order_base=='6')
                          {
                            ?>
 <p><b>Order  :</b> FO</p>
                            <?php
                          }

                         ?>

                        
                        
                      
             </div>
              
                    
                        
                      
             </div>


        </td>
    </tr>
    
    
    
    <!--<tr class="head1">
      <td colspan="4" align="left">Diagnosis</td>
    </tr>
    <tr class="head2">
        <td align="center">Diagnosis Name</td>
        <td align="center">Cost (Rs)</td>
    </tr>-->
    
    
    <tr>
        
    <td colspan="4" >
          <table width="100%" style="border: #d6d6d6 solid 1px;    border-collapse: collapse;">



              <tr class="main_head">
                    <td align="center" >S.No</td>
                     <td align="left" width="30%">Item Description</td>
                     <td align="left" width="20%">HSN/SAC</td>
                     <td align="left" width="20%">SKU</td>
                     <td align="left" width="20%">MRP</td>
                   
                     <td align="right" width="10%">QTY</td>
                     <td align="right" width="30%">Total</td>
                    
                </tr>
              











 <tbody class="tbody">



                <?php

                 $i=1; $j=1;

                 $Total=0;
                 $totalqty=0;
                 foreach ($sales_list_product as $value) {
                     
                     
                    if($value->order_id==$order_id) 
                    {
                        
                    
                 
                  $Total+= $value->qty*$value->mrp;
                  
                  $totalqty+=$value->qty;
                 
                 ?>
                  <tr class="al_tr<?php echo $j;?>">
                    <td align="center"><?php echo $i; ?></td>
                    <td align="left">
                    <?php
                              
                              foreach ($product_price as  $m) {
                                                                            
                                                                              if($m->id==$value->product_name)
                                                                              {
                                                                                   echo $m->name;
                                                                              }
                                                                         
                                                                      
                             
                             }
                                                                      
                                                                      
                     
                      ?> </td>

                       <td align="left">15081000 </td>
                    <td align="left"><?php echo $value->sku; ?> </td>
                    <td align="left">Rs. <?php echo $value->mrp; ?> </td>
                    <td align="right"><?php echo $value->qty; ?> Ltr </td>
                    <td align="right">Rs. <?php echo $value->qty*$value->mrp; ?> </td>
                     

              
                     
                     

                 </tr>
                <?php $i++; }} ?>





<tr class="al_tr0">
   <td align="center"></td>
   <td align="left"> </td>
   <td align="left"></td>
     
     <td align="left"></td>
 
   <td align="right"></td>
   <td align="right"> </td>
    <td align="right"> </td>
</tr>

<tr class="al_tr0">
   <td align="center"></td>
   <td align="left"> </td>
   <td align="left"></td>
     
     <td align="left"></td>
 
   <td align="right"></td>
   <td align="right"> </td>
    <td align="right"> </td>
</tr>


<tr class="al_tr0">
   <td align="center"></td>
   <td align="left"> </td>
   <td align="left"></td>
     
     <td align="left"></td>
 
   <td align="right"></td>
   <td align="right"> </td>
    <td align="right"> </td>
</tr>


<tr class="al_tr0">
   <td align="center"></td>
   <td align="left"> </td>
   <td align="left"></td>
     
     <td align="left"></td>
 
   <td align="right"></td>
   <td align="right"> </td>
    <td align="right"> </td>
</tr>


</tbody>
</table>
            
        
    </tr>
    

    <tr class="g_total_tr">
        <td  colspan="2">Net QTY weight : <b><?php echo $totalqty; ?> Ltr </b></td> 


        <td align="right">Sub Total (Rs)</td>
        <td align="right">Rs. <?php echo $Total; ?></td>
       
    </tr>
    
    <tr class="g_total_tr">
         <td  colspan="2"></td> 
        <td align="right" >Discount (Rs)</td>
        <td align="right">Rs. <?php echo $discount; ?></td>
       
    </tr>
    
    
    <?php
    if($gst_visable=='1')
    {
        ?>
         <tr class="g_total_tr">

            <td  colspan="2"></td> 
      
        <td align="right">GST (% <?php echo $gst; ?> ) Inc</td>
        <td align="right">Rs. <?php echo $Total*$gst/100; ?></td>
       
        </tr>
        <?php
    }
    ?>
   
    
    <!--<tr class="g_total_tr">
        <td></td> <td></td>
        <td align="right">Total Before TCS </td>
        <td align="right">Rs. <?php echo $Total; ?></td>
       
    </tr> 
    
    <tr class="g_total_tr">
        <td></td> <td></td>
        <td align="right"> TCS @ 0.70%</td>
        <td align="right">0</td>
       
    </tr> 
     
    <tr class="g_total_tr">
        <td></td> <td></td>
        <td align="right"> Sub Total (Rs)</td>
        <td align="right">Rs. <?php echo $Total; ?></td>
       
    </tr>-->
     
  
 
   <tr class="g_total_tr">
           <td  colspan="2"></td> 
        <td align="right"> Grand Total (Rs)</td>
        <td align="right">Rs. <?php echo $Total-$discount;  
        $fulltotal=$Total-$discount ?></td>
    

    <?php
     $Totalfull=$Total-$discount;
    ?>
    
   
    </tr>
<?php 

if(isset($this->session->userdata['logged_in']['access']))
{
    

?>    
    
    <tr>
       <td colspan="4" align="right">


 <input type="button" id="payment" class="no-print" value="Payment" style="padding:5px 10px; border:none; background:#2358A7; color:#fff; cursor:pointer; border-radius:2px; font-size:13px; margin-top:5px;" />


        <input type="button" onClick="window.print();" class="no-print" value="Print" style="padding:5px 10px; border:none; background:#2358A7; color:#fff; cursor:pointer; border-radius:2px; font-size:13px; margin-top:5px;" />


 


      </td>
    </tr>
    
<?php
}
?>
    
<tr>
      
    <td colspan="4">
          <table width="100%" style="border: #d6d6d6 solid 1px;    border-collapse: collapse;">
          <tr class="main_head">
            <td>
               Payment status :  <?php  echo $satatus; ?>
               <br>
               
               <?php 





                 if($payment_status==0 || $payment_status=="")
                 {
                   echo "<span style='color:red;'> Unpaid </span>";
                 }
                 else
                 {
                  echo "<span style='color:green;'> Paid </span>";
                 }



               ?>
            </td>
              
                <td  colspan="3" align="left" style="text-transform: capitalize;">Note : 

                   <textarea style="width: 100%;border: #ededed solid 1px;"><?php echo $notes; ?></textarea>
                    
                 

                  </td>
                    
                   
             </tr>
            
          </table>
    </td>
</tr>


















                
               <tr  id="showtable">
                  <td>
                     
                     <!--  <input type="radio" name="mode" class="radio_btn" id="Online" value="7">
                      <label for="Online">Online</label>
                     -->
                      <input type="radio" name="mode" class="radio_btn" id="cash" value="1">
                      <label for="cash">Cash</label>

                     
                     <!--   <input type="radio" name="mode" class="radio_btn" id="card" value="2">
                       <label for="card">Card</label>
                        -->
                       <input type="radio" name="mode" class="radio_btn" id="Gpay" value="3">
                       <label for="Gpay">Payment Pending </label>
                       
                       
                       
                       <input type="radio" name="mode" class="radio_btn" id="bank" value="5">
                       <label for="bank">Other</label>
                       
                       
                     <!--   <input type="radio" name="mode" class="radio_btn" id="Half" value="6">
                        <label for="Half">Payment Pending</label>
                         --> 
                        
                       
                       
                            
                   <!--     <input type="radio" name="mode" class="radio_btn" id="due" value="9">
                       <label for="due">Split payment</label>
 -->
                       
                       
                       
                       
                      

                  </td>
               </tr>
               
               
                  <tr id="online-display" style="display: none;">
                  <td style="text-align: right;">
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12"  id="amount_online_view">
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Enter Amount :</label>
                                              <input type="number" name="amount_online" value="<?php echo round($Totalfull); ?>" id="amount_online" class="form-control">
                                              <input type="submit" value="Payment Link"  id="amount_details_online" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                 </div>
                                 
                                 
                                 <div class="col-md-5 col-lg-5 col-sm-12"  id="trancation_view" style="display:none;">
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Trancation ID :</label>
                                              <input type="text" name="trancation_id"  id="trancation_id" class="form-control">
                                              <input type="submit" value="Save"  id="save_amount_details_online"  class="form-control">
                                            </div>
                                 </div> 


                  </td>
               </tr>
               


                <tr id="amount-display" style="display: none;">
                  <td >
                     
                     
                    
                                
                                
                                 <div class="col-md-5 col-lg-5 col-sm-12" style="" id="amount">
                                            <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">PaidAmount :</label>
                                              <input type="number" name="amount"    id="amount_data_p" class="form-control">
                                              
                                            </div>
                                            <br>
                                              <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Pendind Amount :</label>
                                              <input type="number" name="amount"    id="amount_data_p1" class="form-control">
                                              <input type="submit"   id="amount_details_pending" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                            
                                             
                                 </div> 


                  </td>
               </tr>
               
               
                 <tr id="amount-spilt" style="display: none;">
                  <td >
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" style="" id="amount">
                                            <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Cash Amount :</label>
                                              <input type="number" name="amount"    id="amount_data_spilt" class="form-control">
                                             
                                            </div>
                                            <br>
                                     
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Card Or Online Amount:</label>
                                              <input type="number" name="amount" placeholder="Card Or Online Amount" id="phone_pay_number_spilt" class="form-control">
                                              
                                            </div>
                                            
                                            <br>
                                     
                                             <div class="form-group form-primary">
                                               <label for="Details" required="" class="col-form-label">Details:</label>
                                              <input type="text" name="Details" placeholder="Payment details" id="payment_details" class="form-control">
                                              <input type="submit"   id="amount_details_split" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                             
                                 </div> 


                  </td>
               </tr>
               
               <tr id="amount-cash" style="display: none;">
                  <td >
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" style="" id="amount">
                                            <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Amount :</label>
                                              <input type="number" name="amount"  style="background: #dbdbdb;" readonly value="<?php echo round($Totalfull); ?>" id="amount_data" class="form-control">
                                              <input type="submit"   id="amount_details_cash" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                            
                                             
                                 </div> 


                  </td>
               </tr>
               
               
                 <tr id="duepayments" style="display: none;">
                  <td>
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" style="" id="date">
                                             <div class="form-group form-primary">
                                               <label for="date" required="" class="col-form-label">Date :</label>
                                              <input type="date" name="date" id="date_data" class="form-control">
                                              <input type="submit"   id="duepayment_save" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                 </div> 


                  </td>
               </tr>


                <tr id="card-display" style="display: none;">
                  <td >
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" style="" id="amount">
                                     
                                     
                                           <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Amount :</label>
                                              <input type="number" name="amount" style="background: #dbdbdb;" id="amount_card" readonly value="<?php echo round($Totalfull); ?>" class="form-control">
                                            
                                            </div>
                                             <br>
                                             
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Card Last 4 digits :</label>
                                              <input type="number" name="amount" id="card_number" class="form-control">
                                              <input type="submit"  id="card_details"  data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                 </div> 


                  </td>
               </tr>
               
               
                  <tr id="payments" style="display: none;">
                  <td style="text-align: right;line-height: 40px;">
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" >
                                           <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Amount :</label>
                                              <input type="number" name="amount" id="amount_cash" style="background: #dbdbdb;" readonly value="<?php echo round($Totalfull); ?>"  class="form-control">
                                             
                                            </div>
                                            
                                          
                                           
                                     
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Cheque Details :</label>
                                              <input type="text" name="amount" id="details" placeholder="Cheque No" class="form-control">
                                              <input type="submit"  id="cash_card_payments" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                 </div> 


                  </td>
               </tr>
               
               
               
               
               
                 <tr id="bank-display" style="display: none;">
                  <td style="line-height: 40px;">
                     
                     
                    
                                 <div class="col-md-5 col-lg-5 col-sm-12" >
                                     
                                              
                                               <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Amount :</label>
                                              <input type="number" name="amount"  style="background: #dbdbdb;" id="amount_bank" readonly value="<?php echo round($Totalfull); ?>" class="form-control">
                                             
                                            </div>
                                      
                                     
                                             <div class="form-group form-primary">
                                               <label for="amount" required="" class="col-form-label">Transaction Details :</label>
                                              <input type="text" name="amount" id="bank_details" placeholder="Card No / UPI ID / Transaction" class="form-control">
                                              <input type="submit"  id="bank_card_payments" data-value="<?php echo round($Totalfull); ?>" class="form-control">
                                            </div>
                                            
                                 </div> 


                  </td>
               </tr>






















<tr>
        
    <td colspan="4">
          <table width="100%" style="border: #d6d6d6 solid 1px;    border-collapse: collapse;">
          
             <tr class="main_head">
                 
                      <td  colspan="3" align="ledt" style="text-transform: capitalize;">Amount In Words : <?php echo  getIndianCurrency($fulltotal); ?></td>
                    
                 
             </tr>
             
             <tbody class="tbody">

             <tr class="al_tr0">
                
                
               <td align="left" width="35%"> 

                <p>Terms and conditions

                <br>
                 Thanks for doing business with us! </p>

                 <p><b>Received by:</b></p>

                 <p><?php echo $customer_name; ?></p>
                 <p>Comment :     <?php echo $notes; ?></p>
                 <p>Date :      :     <?php echo date('d-m-Y'); ?></p>
                 <p>Signature :      </p>

                 <hr></hr>


                  <p><b>Delivered by:</b></p>
                  <p>Name : </p>
                  <p>Comment : </p>
                      


              </td>
              
             
                  <td align="center" width="35%">

                     <br>
                  Authorized signatory</td>
             
             
            </tr>
            
           
           
            
            </tbody>


          </table>
    </td>
</tr>
   





</table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#showtable').hide();
$('#payment').on('click',function(){

$('#showtable').toggle();

});







 $(".radio_btn").change(function(){

                        var   val = $(this).val();
                       
                        if(val==1)
                        {
                           $('#card-display').hide();
                           $('#amount-display').hide();
                           $('#amount-cash').show();
                            $('#payments').hide();
                            $('#bank-display').hide();
                             $('#duepayments').hide();
                             $('#online-display').hide();
                              $('#amount-spilt').hide();
                           
                        }
                        
                         if(val==3)
                        {
                           $('#card-display').hide();
                           $('#amount-display').show();
                            $('#payments').hide();
                            $('#bank-display').hide();
                             $('#duepayments').hide();
                            $('#amount-cash').hide();
                            $('#online-display').hide();
                             $('#amount-spilt').hide();
                        }
                        
                         if(val==2)
                        {
                           $('#card-display').show();
                           $('#amount-display').hide();
                            $('#payments').hide();
                            $('#bank-display').hide();
                             $('#duepayments').hide();
                             $('#amount-cash').hide();
                             $('#online-display').hide();
                              $('#amount-spilt').hide();
                           
                        }
                        
                        
                         if(val==4)
                        {
                           $('#card-display').hide();
                           $('#amount-display').hide();
                           
                           $('#payments').show();
                           $('#bank-display').hide();
                           $('#duepayments').hide();
                           $('#amount-cash').hide();
                           $('#online-display').hide();
                            $('#amount-spilt').hide();
                           
                        }
                        
                        if(val==5)
                        {
                           $('#bank-display').show();
                           
                           $('#amount-display').hide();
                           $('#card-display').hide();
                           $('#payments').hide();
                           $('#duepayments').hide();
                           $('#amount-cash').hide();
                           $('#online-display').hide();
                            $('#amount-spilt').hide();
                           
                        }
                        
                        if(val==6)
                        {
                           $('#bank-display').hide();
                           
                           $('#amount-display').hide();
                           $('#card-display').hide();
                           $('#payments').hide();
                           
                           $('#duepayments').show();
                           $('#amount-cash').hide();
                           $('#online-display').hide();
                            $('#amount-spilt').hide();
                           
                        }
                        if(val==7)
                        {
                           $('#bank-display').hide();
                           
                           $('#amount-display').hide();
                           $('#card-display').hide();
                           $('#payments').hide();
                           
                           $('#duepayments').hide();
                           $('#amount-cash').hide();
                           $('#online-display').show();
                           $('#amount-spilt').hide();
                           
                        }
                        
                         if(val==9)
                        {
                           $('#bank-display').hide();
                           
                           $('#amount-display').hide();
                           $('#card-display').hide();
                           $('#payments').hide();
                           
                           $('#duepayments').hide();
                           $('#amount-cash').hide();
                           $('#online-display').hide();
                           $('#amount-spilt').show();
                           
                        }

         });









   $('#bank_card_payments').on('click',function(){

     var card_number= $('#bank_details').val();
     var amount_bank= $('#amount_bank').val();
               
     var mode= $('input[name="mode"]:checked').val();

     var id="<?php echo $id; ?>";
      
   
      
     if(card_number!='')
     {

                $.ajax({ 

                    type: 'POST',  
                    url: '<?php echo base_url("production/update_payment"); ?>', 
                    data: { id: id,mode:mode,card_number: card_number,amount_card:amount_bank },
                    beforeSend: function() {
                        
                        $('#bank_card_payments').val('loading...');
                       
                    },
                    success: function(response) {
                          location.reload();
                    }

                });


             
     }
     else
     {
             alert('Transaction Details required!');
     }

   });
   


 $('#amount_details_cash').on('click',function(){
      
      
      
     var validation_amount= $(this).data('value');
     
     
     var mode= $('input[name="mode"]:checked').val();

 
     var amount_data= $('#amount_data').val();

     var id="<?php echo $id; ?>";
     

     if(amount_data!='')
     {
         
         
         if(validation_amount==amount_data)
         {
             
                 $.ajax({ 

                    type: 'POST',  
                    url: '<?php echo base_url("production/update_amt"); ?>', 
                    data: { id: id,mode:mode,amount_data: amount_data},
                    beforeSend: function() {
                        
                        $('#amount_details_cash').val('loading...');
                       
                    },
                    success: function(response) {
                          location.reload();
                    }
                });
                
                
         }
         else
         {
              alert('Value mismatche!');
         }

              


             
     }
     else
     {
             alert('Amount required!');
     }

   });




 $('#amount_details_pending').on('click',function(){
      
      
      
     var validation_amount= $(this).data('value');
     
     
     var mode= $('input[name="mode"]:checked').val();

 
     var amount_data_set= parseInt($('#amount_data_p').val());
    var amount_data1= parseInt($('#amount_data_p1').val());
      
      
    var amount_data=  amount_data_set+amount_data1;
    
    
    alert(amount_data);
    
     var id="<?php echo $id; ?>";
     

     if(amount_data!='' && amount_data1!='')
     {
         
         
         if(validation_amount==amount_data)
         {
             
                 $.ajax({ 

                    type: 'POST',  
                    url: '<?php echo base_url("production/update_amt"); ?>', 
                    data: { id: id,mode:mode,amount_data: amount_data_set,amount_data1: amount_data1},
                    beforeSend: function() {
                        
                        $('#amount_details_cash').val('loading...');
                       
                    },
                    success: function(response) {
                         // location.reload();
                    }
                });
                
                
         }
         else
         {
              alert('Value mismatche!');
              return false;
         }

              


             
     }
     else
     {
             alert('Amount required!');
              return false;
     }

   });





});
</script>


<?php
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
       }
       $Rupees = implode('', array_reverse($str));
       $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
       return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

?>

