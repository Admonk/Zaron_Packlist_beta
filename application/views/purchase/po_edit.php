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
    text-align: center;
}
td.text-right.bold {
    text-align: right !important;
    font-size: 14px;
    font-weight: 700;
}select.selectbox {
    border: none;
    -webkit-appearance: none;
    width:100%;
}







input.selectbox {
    border: none;
    width: 100%;
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
    padding: 15px;
    max-width:100%;
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
                <div class="invoice-inner-6" id="invoice_wrapper" ng-init="fetchSingleDatatotal('1')">
                    <div class="invoice-info">
                      
                                <div class="row">
                                    
                                    <div class="col" style="margin: auto;">
                                        <h2>INVOICE EDIT</h2>
                                        
                                        <table class="table">
                                           
                                               <tr>
                                                 <td>Invoice Number		</td>
                                                 <td>{{order_no_id}}	</td>
                                              </tr>
                                               <tr>
                                                 <td>Invoice Date		</td>
                                                 <td>{{create_date}}	</td>
                                              </tr>
                                            <tr ng-init="fetchVendor()">
                                                 <td>Vendor		</td>
                                                 <td>{{vendorname}}	 {{vendorphone}}</td>
                                              </tr>
                                        </table>
                                        
                                       
                                    </div>
                                </div>
                            
                    </div>
                    
                 
                    


                    <div class="order-summary">
                        <div class="table-responsive" ng-init="fetchDataCategorybase(1)">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                      
                        <div  navigatable ng-init="fetchData('1')">
                           <div class="navclass">
                                 
                                
                                
                                
                                  
                                 <div  data-pattern="priority-columns" >
                                    <table id="datatable" class="table invoice-table" >
                                     
                                     
                                     
                                     
                                       <thead class="bg-gray text-red" >
                                         
                                         
                                        
                                          <tr>
                                           <th  >S.NO</th>  
                                           <th class="table-width-18"  >Products </th>
                                           <th class="table-width-18" >SPEC</th>
                                          
                                           <th class="table-width-8" >UNIT</th>
                                           <th class="table-width-8" >RATE</th>
                                           <th class="table-width-8" >QTY </th>
                                           
                                           <th class="table-width-8" >UPDATE RATE</th>
                                           <th class="table-width-8" >UPDATE QTY </th>
                                           <th class="table-width-8" >AMOUNT </th>
                                          </tr>
                                          
                                          
                                          
                                       </thead>
                                       
                                       
                                      
                                       <tbody  ng-repeat="name in namesData|orderBy:column:reverse" >
                                           
                                           
                                           

                                          <tr class="view">
                                           
                                             <td >{{name.no}}</td>
                                             <td title="{{name.categories}}">{{name.product_name_tab}}  </td>
                                             <td ><input class="selectbox" typec="text" <?php echo $read; ?>   ng-blur="inputsave_1(name.id,'specifications',1,1)"   id="specifications_{{name.id}}" value="{{name.specifications}}"></td>
                                             
                                             <td><select class="selectbox"   ng-change="inputsave_1(name.id,'uom',1,1)" id="uom_{{name.id}}"  ng-model="calulation">
                                                
                                                 <option value="1" ng-selected="{{name.uom == 1}}">TON</option>
                                                       <option value="2" ng-selected="{{name.uom == 2}}">SQ.MTR</option>
                                                        <option value="3" ng-selected="{{name.uom == 3}}">FEET</option>
                                                         <option value="4" ng-selected="{{name.uom == 4}}">MM</option>
                                                        <option value="5" ng-selected="{{name.uom == 5}}">MTR</option>
                                                         <option value="6" ng-selected="{{name.uom == 6}}">INCH</option>
                                                       <option value="7" ng-selected="{{name.uom == 7}}">KG</option>
                                                      <option value="8" ng-selected="{{name.uom == 8}}">SQ.FT</option>
                                                      
                                                      <option value="9" ng-selected="{{name.uom == 9}}">NOS</option>
                                                     
                                                 
                                                 
                                                 </select>
                                             </td>
                                             <td>{{name.rate_tab}}</td>
                                             <td>{{name.qty_tab}}</td>
                                            
                                              <td ng-if="name.checked==0"><input class="selectbox" typec="text"  ng-keyup="inputsave_1(name.id,'rate_edit',1,1)"    id="rate_edit_{{name.id}}" value="{{name.rate_edit}}"></td>
                                             <td ng-if="name.checked==0"><input class="selectbox" typec="text"  ng-keyup="inputsave_1(name.id,'qty_edit',1,1)"    id="qty_edit_{{name.id}}" value="{{name.qty_edit}}"></td>
                                            
                                            <td ng-if="name.checked!=0">{{name.rate_edit}}</td>
                                             <td ng-if="name.checked!=0">{{name.qty_edit}}</td>
                                            
                                            
                                             <td id="amount_{{name.id}}" data-label="Amount">
                                                 
                                                 
                                          {{name.amountdata_edit}}
                                                
                                                 
                                                 
                                                 
                                                 
                                                 
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
   


    $http.get('<?php echo base_url() ?>index.php/purchase/fetch_data_purchase?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert='+id).success(function(data){
      
      
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













$scope.inputsave_1 = function (id,inputname,categories_id,type) {


                     
                     
                       var fieds=inputname+'_'+id;
                       
                      
                       
                       var values=$('#'+fieds).val();
                          
                         
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/purchase/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          
                             
                       });
                       
                       
                       
                       var ratetotal=parseFloat($('#rate_edit_'+id).val());
                       var qtytotal=parseFloat($('#qty_edit_'+id).val());
                       
                       
                       var toatlamt=ratetotal*qtytotal;
                       
                       var toatlamtamm=toatlamt.toFixed(2);
                       $('#amount_'+id).html(toatlamtamm);
                       
                       
                       
                       if(inputname=='qty')
                       {
                           $scope.fetchSingleDatatotal(1);
            
                       }
                      

}













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
