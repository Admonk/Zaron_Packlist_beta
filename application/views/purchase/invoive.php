<?php
//--->get app url > start

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $ssl = 'https';
}
else {
  $ssl = 'http';
}
 
$app_url = ($ssl  )
          . "://".$_SERVER['HTTP_HOST']
          //. $_SERVER["SERVER_NAME"]
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

//--->get app url > end

header("Access-Control-Allow-Origin: *");

?><?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style>
    
select.selectbox {
    border: none;
    -webkit-appearance: none;
    font-weight: 800;
}
select#user_id {
    width: 25%;
    display: inline;
    border: none;
    color: green;
    font-weight: 800;
}
textarea.form-control.linetext {
 
    border: #fbf8f8;
    padding: 0px;
    font-size: 14px;
     font-weight: 700;
}
input.form-control.linetext {
 
    border: none;
    padding: 0px;
    font-size: 14px;
     font-weight: 700;
}
.h3, h3 {
    font-size: 17px;
    font-weight: 700;
}
body,p,small {
    font-weight: 700;
}
tbody {
    font-size: 12px;
    font-weight: 800;
}

.table thead th {
    vertical-align: unset;
    border-bottom: 2px solid #dee2e6;
}

p {
    margin-top: 0;
    margin-bottom: 2px  !important;
}


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 
<script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>


 	<script type="text/javascript">
	$(document).ready(function($) 
	{ 
 
		$(document).on('click', '.btn_print', function(event) 
		{
			event.preventDefault();

			//credit : https://ekoopmans.github.io/html2pdf.js
			
			var element = document.getElementById('invoice'); 

			//easy
			//html2pdf().from(element).save();

			//custom file name
			//html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();

            var order_id='<?php echo $invoice_no; ?>';
             
			//more custom settings
			var opt = 
			{
			   margin:       0.3,
			  filename:     'Zaron_Purchase_Invoice-'+order_id+'.pdf',
			  image:        { type: 'jpeg', quality: 0.98 },
			  html2canvas:  { scale: 1 },
			   jsPDF:        { unit: 'mm', format: 'a4', orientation: 'p',putOnlyUsedFonts:true }
			  
			};

			// New Promise-based usage:
			html2pdf().set(opt).from(element).save();

			 
		});

 
 
	});
	</script>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">



  <div class="invoice-btn-section clearfix d-print-none mb-4">
                   
                  
                    <div class="text-center" style="padding:20px;">
                      <!--<input type="button" id="rep" value="Download" class="btn btn-info btn_print">-->
                    		 <input type="button" onclick="window.print()" value="Print" class="btn btn-info">
                    </div>
                    
                    
                </div>


<div id="invoice" class="invoice-6 invoice-content" >
    <div class="container invoice" >
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-6" id="invoice_wrapper" ng-init="fetchSingleDatatotal('1')">
                    <div class="invoice-info">
                      
                                <div class="row">
                                    <div class="col">
                                        <a target="_blank" href="http://erp.zaron.in">
                                            <img class="logo" src="http://erp.zaron.in/assets/logo.svg" alt="logo">
                                            <p>ZARON INDUSTRIESS	</p>
                                            <p class="text-font">5/112, Rajalakshmi garden,Tirupur Main road,Kaikattipudhur, Avinashi, Tamil Nadu 641654</p>
				

                                            </a>
                                    </div>
                                    <div class="col" style="margin: auto;">
                                        <h2>INVOICE</h2>
                                        
                                        
                                        
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
                                                <td>INVOICE NO		</td>
                                                 <td>{{invoice_no}}	</td>
                                            </tr>
                                               <tr>
                                                <td>INVOICE DATE		</td>
                                                <td>{{invoice_date}}	</td>
                                               </tr>
                                               
                                               
                                               <tr>
                                                <td>PAYMENT STATUS		</td>
                                                <td>{{payment_status}}	</td>
                                               </tr>
                                            
                                                <tr ng-if="schedule_date!=''">
                                                <td>SCHEDULE DATE		</td>
                                                <td>{{schedule_date}}	</td>
                                               </tr>
                                            
                                            
                                        </table>
                                        
                                       
                                    </div>
                                </div>
                            
                    </div>
                    
                    <div class="invoice-info">
                        <div class="row">
                            <div class="col invoice-to">
                                 <h4 class="inv-title-1">DELIVERY ADDRESS</h4>
                                             <b> {{office_address_name}} </b><br>


                                           
                                            <p class="invo-addr-1">{{office_address_phone}} </p>
                                            <p class="invo-addr-1" style="width:350px">{{office_address_address}} </p>  
                                              <p>E.MAIL :   procurement@zaron.in        </p>
                                </div>
                                <div class="col invoice-details" ng-init="fetchVendor()">
                                    <h4 class="inv-title-1">VENDOR ADDRESS</h4>
                                                <p class="invo-addr-1">{{vendorname}} </p>
                                                 <p class="invo-addr-1">Ph: {{vendorphone}} </p>
                                                <p class="invo-addr-1">{{vendoremail}} </p>
                                                <!--<p class="invo-addr-1">{{gst}} </p>-->
                                                <p class="invo-addr-1" style="width:350px">{{address}} </p>
                                              
                                   
                                </div>
                                
                            
                        </div>
                      
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    


                    <div class="order-summary">
                        <div class="table-responsive" ng-init="fetchDataCategorybase(1)">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                      
                        <div  navigatable ng-init="fetchData('<?php echo $invoice_id; ?>')">
                           <div class="navclass">
                                 
                                
                                
                                
                                  
                                 <div  data-pattern="priority-columns" >
                                    <table id="datatable" class="table invoice-table" >
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" >
                                         
                                         
                                        
                                          <tr>
                                           <th class="table-width-10" >S.NO</th>  
                                           <th class="table-width-18"  >Products </th>
                                           <th class="table-width-8" >UNIT</th>
                                            <th class="table-width-8" >RATE</th>
                                           <th class="table-width-8" >QTY </th>
                                            <th class="table-width-8" >AMOUNT </th>
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                      
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" >
                                           
                                           
                                           

                                          <tr class="view">
                                           
                                             <td >{{name.no}}</td>
                                             <td title="{{name.categories}}">{{name.product_name}}  </td>
                                            
                                             <td>{{name.unit}} </td>
                                            
                                              <td >{{name.price | number}}</td>
                                             <td >{{name.qty}}</td>
                                            <td >{{name.row_total | number}}</td>
                                          </tr>
                                        
                                       

                                          
                                          
                                       </tbody>
                                            
                                      
                                         <tr ng-if="invoice_totalextra!=0" style="display:none;">
                                           
                                             <td ></td>
                                             <td ></td>
                                           
                                             <td> </td>
                                              <td ></td>
                                             <td >Extra</td>
                                            <td >{{invoice_totalextra | number}}</td>
                                          </tr>
                                          
                                       
                                          <tr ng-init="invoicepayment('<?php echo $invoice_id; ?>')">
                                           
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                              <td ></td>
                                             <td >SUB TOTAL</td>
                                            <td >Rs. {{invoice_subtotal |number}}</td>
                                          </tr>
                                       
                                       
                                        <tr ng-if="loading_charges>0">
                                           
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                              <td ></td>
                                             <td >Loading Charges  </td>
                                            <td >Rs. {{loading_charges |number}}</td>
                                          </tr>
                                          
                                         
                                          
                                          
                                            <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                              <td ></td>
                                             <td >GST 18 % </td>
                                            <td >Rs. {{invoice_gstamount |number}}</td>
                                          </tr>
                                          
                                          
                                             <tr ng-if="tcsamount>0">
                                           
                                             <td ></td>
                                             <td ></td>
                                             
                                             <td> </td>
                                              <td ></td>
                                             <td >TCS </td>
                                            <td >Rs. {{tcsamount |number}}</td>
                                          </tr>


                                             <tr ng-if="roundoffset>0">
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td></td>
                                                                         <td>Round Off </td>
                                                                         <td>Rs. {{roundoffset |number}} {{convert_status}}</td>
                                          </tr>
                                          
                                            <tr >
                                           
                                             <td ></td>
                                             <td ></td>
                                            
                                             <td> </td>
                                              <td ></td>
                                             <td >FINAL TOTAL </td>
                                            <td >Rs. {{invoice_fulltotal |number}}</td>
                                          </tr>
                                          
                                        
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
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

app.filter('number', function () {
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
    






$scope.fetchData = function(id){
   


    $http.get('<?php echo base_url() ?>index.php/purchase/purchase_fetch_cp_invoice_product?id='+id).success(function(data){
      
      
      $scope.namesData = data;
      
      
      
    });
    
   
  
   
  };
  
  
  
  
  
  
  
  
  
  
  
  
$scope.calulation=1;
$scope.order_base=0;
$scope.reason="";
$scope.order_date=new Date();
 

$scope.fetchSingleDatatotal = function(id)
{
    
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>','convert':id}
      }).success(function(data){

       $scope.fulltotal = data.fulltotal;
        $scope.totalamountgat = data.totalamountgat;
         $scope.discountfulltotal = data.discountfulltotal;
         $scope.totalextra = data.totalextra;
         
       $scope.commission = data.commission;



           $scope.office_address_name = data.office_address_name;
           $scope.office_address_phone = data.office_address_phone;
           $scope.office_address_address = data.office_address_address;  
       
         $scope.po_number = data.po_number;
         //$scope.invoice_no = data.invoice_no;
          $('#liner_print').val(data.liner_print);
       $('#tentative_delivery_date').val(data.tentative_delivery_date);
       $('#special_requests').val(data.special_requests);
       
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
        $scope.totalamountgat = data.totalamountgat;
     
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
     
     
      
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
    });
};



$scope.saveData = function(id,name){
     
     
     
     var value=$('#'+name).val();
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/purchase/insertandupdate",
        data:{'id':id,'value':value,'name':name, 'action':'updatefeedback','tablename':'purchase_orders_process'}
      }).success(function(data){
        
        
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

  $scope.invoicepayment = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/purchase/fetch_invoicetotal?id='+id).success(function(dataaddress){
      
      
         $scope.invoice_totalextra = dataaddress.invoice_totalextra;
         $scope.invoice_gstamount = dataaddress.invoice_gstamount;
         $scope.loading_charges = dataaddress.loading_charges;
         $scope.invoice_subtotal = dataaddress.invoice_totalamount;
         $scope.invoice_fulltotal = dataaddress.invoice_fulltotal;
         $scope.tcsamount = dataaddress.tcsamount;


           $scope.roundoffset = dataaddress.roundoffset;
           $scope.convert_status = dataaddress.convert_status;
         
         $scope.invoice_no = dataaddress.invoice_no;
         $scope.invoice_date = dataaddress.invoice_date;
          $scope.payment_status = dataaddress.payment_status;
            $scope.schedule_date = dataaddress.schedule_date;
      
       
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
