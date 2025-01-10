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
    padding: 10px 5px !important;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
    border-right: 1px solid #e9ecef;
    text-align:  left !important;
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

.table tr td {
    text-align: left !important;
   
    line-height: 20px;
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
    margin-bottom: 0px
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

.logo {
   
    
    width: 60%;
}
p.text-font {
    color: black;
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
                                            <img class="logo" src="https://admonk.in/zaron_beta/assets/logo.svg" alt="logo">
                                            <p>ZARON INDUSTRIESS	</p>
                                            <p class="text-font">5/112, Rajalakshmi garden,Tirupur Main road,Kaikattipudhur, Avinashi, Tamil Nadu 641654</p>
				

                                            </a>
                                    </div>
                                    
                                    <?php
                                    foreach($purchase_order_return as $val)
                                    {
                                         $dc=$val->po_number;
                                         $return_date=$val->return_date;
                                         $vendor_id=$val->vendor_id;
                                         $qty=$val->return_qty;
                                         $total_amount=$val->total_amount;
                                         $remarks=$val->remarks;
                                         $product_id=$val->product_id;
                                         $stock_id=$val->stock_id;
                                         
                                         
                                    }
                                      foreach($product_list as $vals)
                                    {
                                        if($vals->id==$product_id)
                                        {
                                             $product_name=$vals->product_name;
                                        }
                                      
                                    
                                    }
                                    
                                    ?>
                                    <div class="col" style="margin: auto;">
                                        <h2>DELIVERY CHALLAN</h2>
                                        
                                        <table class="table">
                                            <tr>
                                                <td>GSTIN	</td>
                                                 <td>33AAAFZ8146Q1ZI	</td>
                                            </tr>
                                               <tr>
                                                <td>PAN NO		</td>
                                                 <td>AAAFZ8146Q	</td>
                                            </tr>
                                               <tr>
                                                <td>DC Number		</td>
                                                 <td><?php echo $dc; ?>	</td>
                                            </tr>
                                               <tr>
                                                <td>DC Date		</td>
                                                 <td><?php echo date('d-m-Y',strtotime($return_date)); ?>	</td>
                                            </tr>
                                            
                                        </table>
                                        
                                       
                                    </div>
                                </div>
                            
                    </div>
                    
                    <div class="invoice-info">
                        <div class="row">
                            <div class="col invoice-to">
                                 <h4 class="inv-title-1">CORPORATE ADDRESS</h4>
                                            <p class="invo-addr-1">
                                            <b> Corporate Office </b><br>
                                            4/333/7, N.H Bye Pass		
                                            Road. Kaikattipudhur,		
                                            Avinashi, Tirupur, <br>Tamilnadu		
                                            641 654. <br>Ph: +91 98654 18338		
                                            <br>E.MAIL :   procurement@zaron.in		</br>
                                                                                       
                                            
                                  </p>
                                </div>
                                <div class="col invoice-details" ng-init="fetchVendor()">
                                    <h4 class="inv-title-1">DELIVERY ADDRESS</h4>
                                    <?php
                                    foreach($vendor as $bn)
                                    {
                                        
                                        if($bn->id==$vendor_id)
                                        {
                                            
                                       
                                        ?>
                                        
                                          <p class="invo-addr-1"><?php echo $bn->name; ?> </p>
                                                <p class="invo-addr-1"><?php echo $bn->phone; ?> </p>
                                                <p class="invo-addr-1"><?php echo $bn->email; ?> </p>
                                                <!--<p class="invo-addr-1"><?php echo $bn->gst; ?> </p>-->
                                                <p class="invo-addr-1"><?php echo $bn->address1; ?> <?php echo $bn->address2; ?>  <?php echo $bn->landmark; ?> <?php echo $bn->pincode; ?> <?php echo $bn->city; ?> <?php echo $bn->state; ?></p>
                                        
                                        <?php
                                        }
                                    }
                                    ?>
                                    
                                              
                                              
                                   
                                </div>
                                
                            
                        </div>
                      
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    


                    <div class="order-summary">
                        <div class="table-responsive" >
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                      
                        <div  navigatable >
                           <div class="navclass">
                                 
                                
                                
                                
                                  
                                 <div  data-pattern="priority-columns" >
                                    <table id="datatable" class="table invoice-table" >
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" >
                                         
                                         
                                        
                                          <tr>
                                           <th class="table-width-8" >S.NO</th>  
                                           <th class="table-width-18"  >Products <i class="fa fa-sort" aria-hidden="true"></i></th>
                                           <th class="table-width-8" >QTY <i class="fa fa-sort" aria-hidden="true"></i></th>
                                           <th class="table-width-8" >AMOUNT </th>
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                      
                                       <tbody   >
                                           
                                           
                                           

                                          <tr class="view">
                                           
                                             <td >1</td>
                                             <td ><?php echo $product_name; ?>  </td>
                                           
                                              <td ><?php echo $qty; ?></td>
                                            
                                            <td ><?php echo $total_amount; ?></td>
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                      
                                      
                                       
                                          <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                             
                                          </tr>
                                       
                                       
                                       
                                         <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                             
                                          </tr>
                                          
                                          
                                          
                                            <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                              
                                          </tr>
                                          
                                            <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                             
                                          </tr>
                                          
                                        
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                    </table>
                                 </div>
                              
                              
                                
                                
                              
                              
                         
                           
                              
                           </div>
                        </div>
                        
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        
                        
                                <table class="table" >
                                  
                                <tr>
                                    
                                    
                                    
                                    <td colspan="2" rowspan="3" class="text-end" >
                                     <h3 class="inv-title-1" style="text-align: left"><strong>PAYMENT INFORMATION</strong></h3>
                                     <p style="text-align: left">  
                                     
                                     <span> <b> Mode of Payment : </b> CASH & CARRY BASIS</span> <br>
                                     
                                    
                                     </p>
                                    </td>
                                   
                                    
                                    
                                    <td>
                                        
                                       
                                        
                                                    <p  class="text-end" style="font-size: 14px;margin-right: 25px;"><b>TOTAL : Rs. <?php echo $total_amount; ?></b></p>
                                                    
                                                   
                                            
                                    
                                    </td>  
                                   
                                    
                                    
                                </tr>
                                
                             
                           
                               
                              </table>
                              
                              
                               <table class="table">
                              
                                
                             
                                   <tr>
                                     <td colspan="2" rowspan="3" class="text-end" style="width:50%;">
                                    <b>REMARKS : <?php echo $remarks; ?>				</b>				
</td>
	
	                                <td  class="text-end" >	  
	                                <p  class="text-end" style="font-size: 14px;margin-right: 25px;"><b>FINAL TOTAL : Rs. <?php echo $total_amount; ?></b></p>
	                                  <p  class="text-end" style="font-size: 14px;margin-right: 25px;">ZARON INDUSTRIESS</p>
	                                	</td>
                                   		

						
                                </tr>
                                
                               
                              </table>
                 
                    </div>
                   
             
                   
                   
                    
                </div>
                <div class="invoice-btn-section clearfix d-print-none mb-4">
                   
                    <a href="javascript:window.print()" class="btn btn-lg btn-download" style="background: #302f2f!important;">
                        <i class="fa fa-download"></i> Download DC
                    </a>
                    
                    
                    
                </div>
                
              
            </div>
        </div>
    </div>
</div>







<script>

$(document).ready(function(){
$("#autocomplete").focus();
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
    






$scope.fetchData = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  
  
  
  
  
  
  
  
  
  
  
  
$scope.calulation=1;
$scope.order_base=0;
$scope.reason="";
$scope.order_date=new Date();
 

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
              $scope.po_no='<?php echo $order_no; ?>';
       }
       else
       {
              $scope.order_no_id = data.order_no_id;
              $scope.order_no_new = data.order_no_id;
              $scope.order_no_new_old = data.order_no_id;
              $scope.po_no=data.order_no_id;
          
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
       
       
       $scope.order_base=data.order_base;
       $scope.reason=data.reason;
       
       
       $scope.totalitems = data.totalitems;
       $scope.discounttotal = data.discount;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.minisroundoff = data.minisroundoff;
       
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};


$scope.fetchVendor = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetchVendor?order_id=<?php echo $order_id; ?>",
      data:{'order_id':'<?php echo $order_id; ?>'}
      }).success(function(data){

      
       $scope.vendorname=data.name;
       $scope.vendorphone=data.phone;
       $scope.vendoremail=data.email;
       $scope.gst=data.gst;
       $scope.address=data.address;
      
     
    });
};






$http.get('<?php echo base_url() ?>index.php/purchase/fetchcomapredata_selected?order_id=<?php echo $order_id; ?>').success(function(data){
            $scope.getcomparedata = data;
           
            $scope.compare_payment_terms=data[0].payment_terms;
            $scope.compare_extra=data[0].extra;
            $scope.extra_included=data[0].extra_included;
          
   });








});


    
</script>

    <?php include ('footer.php'); ?>
</body>
</html>
