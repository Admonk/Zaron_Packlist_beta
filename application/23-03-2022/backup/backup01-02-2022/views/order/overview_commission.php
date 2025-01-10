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
</style>
<link href="<?php echo base_url(); ?>assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />


<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">





<div class="invoice-6 invoice-content" id="htmlContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-6" id="invoice_wrapper">
                    <div class="invoice-top">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="logo text-center">
                                    <img class="logo" src="<?php echo LOGO; ?>" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="invoice-info">
                        <div class="row">
                            <div class="col-sm-12 mb-30">
                                <div class="invoice-number text-center">
                                    <h4 class="inv-title-1">RCR</h4>
                                    <p class="invo-addr-1">
                                        RAJALAKSHMI IN ESTATE<br>
                                    4/333/7, N.H., BYE PASS ROAD, KAIKATTI PUDHUR, AVINASHI – 641654, TIRUPUR, TAMILNADU</br>
                                    GST NO: 33AAAFZ8146Q1ZI</br>
                                    Webs: www.Zaron.in | Email: sales@zaron.in</br>
                                    <small>(MANUFACTURERS OF ROOFING SHEETS & C Z PURLINS)</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row">
                            <div class="col-sm-12 mb-30">
                                <h4 class="inv-title-1">Dear Sir,</h4>
                                <p class="inv-from-1"><b>Sub: Price List</b></p>
                                <p>Thank you very much for your enquiry regarding the requirement of roofing sheet. We are glad to inform you that we would be in a position to supply you the requirement posted by you. Given below are the tentative prices and our terms and conditions.</p>
                                <p>The below mentioned prices are for the volume you have enquired.</p>
                            </div>
                        </div>-->
                    </div>

                    <div class="invoice-info">
                        <div class="row">
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number" ng-init="fetchCustomerorderdata()">
                                    <h4 class="inv-title-1">Invoice To</h4>
                                    <p class="invo-addr-1">
                                         {{customername}} <br/>
                                         {{customerphone}}<br/>
                                         {{delivery_address}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number text-end">
                                    <p class="invo-addr-1">
                                        <b>Ref No:  {{order_no_id}}</b><br/>
                                        {{create_date}}<br/>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-30">
                                <h4 class="inv-title-1">Dear Sir,</h4>
                                <p class="inv-from-1"><b>Sub: Price List</b></p>
                                <p>Thank you very much for your enquiry regarding the requirement of roofing sheet. We are glad to inform you that we would be in a position to supply you the requirement posted by you. Given below are the tentative prices and our terms and conditions.</p>
                                <p>The below mentioned prices are for the volume you have enquired.</p>
                            </div>
                        </div>
                    </div>


                    <div class="order-summary">
                        <div class="table-responsive">
                            <table class="table invoice-table" ng-init="fetchData()">
                                <thead class="bg-active">
                                <tr>
                                    <th>S No</th>
                                    <th>Item Item</th>
                                    <th class="text-center">Length</th>
                                    <th class="text-center">No fo Sheet</th>
                                    <th class="text-center">Basic Price (INR)</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody ng-init="fetchSingleDatatotal()">
                                
                                <tr ng-repeat="name in namesData|orderBy:column:reverse">
                                    <td class="text-center">{{name.no}}</td>
                                    <td>
                                        <div class="item-desc-1">
                                            <span>{{name.product_name_tab}}</span>
                                            <small>{{name.description}}</small>
                                            
                                        </div>
                                    </td>
                                    <td class="text-center">{{name.profile_tab}}</td>
                                    <td class="text-center">{{name.nos_tab}} </td>
                                    <td class="text-center">{{name.rate_tab}}  </td>
                                    <td class="text-center">{{name.qty_tab}} 
                                   
                                    <small ng-if="approx_id==1">(approx.)</small>
                                    
                                    
                                    
                                    </td>
                                    <td class="text-center">Rs. {{name.amount_tab}}</td>
                                </tr>

                                <tr>
                                    <td colspan="6" class="text-end">SubTotal</td>
                                    <td class="text-right">Rs. {{amounttotal_with_out_commission}} </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end">Discount</td>
                                    <td class="text-right">Rs. {{discounttotal}} </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end">Commission</td>
                                    <td class="text-right">Rs. {{commissiontotal}} </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end fw-bold">Grand Total</td>
                                    <td class="text-right fw-bold">Rs. {{discountfulltotal}} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                   
                   <?php
                   if(isset($overview_invoice_content)) 
                   {
                       
                       $input1=$overview_invoice_content[0]->input_text;
                       $input2=$overview_invoice_content[1]->input_text;
                       $input3=$overview_invoice_content[2]->input_text;
                       $input4=$overview_invoice_content[3]->input_text;
                       $input5=$overview_invoice_content[4]->input_text;
                       $input6=$overview_invoice_content[5]->input_text;
                       $input7=$overview_invoice_content[6]->input_text;
                       $input8=$overview_invoice_content[7]->input_text;
                       $input9=$overview_invoice_content[8]->input_text;
                       $input10=$overview_invoice_content[9]->input_text;
                       $input11=$overview_invoice_content[10]->input_text;
                       $input12=$overview_invoice_content[11]->input_text;
                       $input13=$overview_invoice_content[12]->input_text;
                       $input14=$overview_invoice_content[13]->input_text;
                       
                   }
                   ?>
                   
                   
                    
                   <?php
                   if(count($overview_invoice_content_base_order)>0) 
                   {
                       
                       $input1=$overview_invoice_content_base_order[0]->input_text;
                       $input2=$overview_invoice_content_base_order[1]->input_text;
                       $input3=$overview_invoice_content_base_order[2]->input_text;
                       $input4=$overview_invoice_content_base_order[3]->input_text;
                       $input5=$overview_invoice_content_base_order[4]->input_text;
                       $input6=$overview_invoice_content_base_order[5]->input_text;
                       $input7=$overview_invoice_content_base_order[6]->input_text;
                       $input8=$overview_invoice_content_base_order[7]->input_text;
                       $input9=$overview_invoice_content_base_order[8]->input_text;
                       $input10=$overview_invoice_content_base_order[9]->input_text;
                       $input11=$overview_invoice_content_base_order[10]->input_text;
                       $input12=$overview_invoice_content_base_order[11]->input_text;
                       $input13=$overview_invoice_content_base_order[12]->input_text;
                       $input14=$overview_invoice_content_base_order[13]->input_text;
                       
                   }
                   ?>
                    
                    <form action="<?php echo base_url(); ?>/order/save_content_by_overview" method="POST">
                        
                  
                    
                    <div class="invoice-informeshon">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Payment Terms</h3>
                                    <ul class="bank-transfer-list-1">
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input1; ?>" ></li>
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input2; ?>" ></li>
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input3; ?>" ></li>
                                        
                                        <input type="hidden" class="form-control linetext" name="order_id" value="<?php echo $order_id; ?>" >
                                        
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Delivery</h3>
                                    <ul class="bank-transfer-list-1">
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input4; ?>" >
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Transport</h3>
                                    <ul class="bank-transfer-list-1">
                                        <li>
                                        <input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input5; ?>" >
                                       
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Unloading</h3>
                                    <ul class="bank-transfer-list-1">
             <li><textarea name="input_text[]" rows="3" class="form-control linetext"><?php echo $input6; ?></textarea>
                                          </li>
                                              </ul>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Force Majeure</h3>
                                    <p><strong>Standard cause Applicable</strong></p>
                                    <textarea name="input_text[]" rows="3" class="form-control linetext"> <?php echo $input7; ?></textarea>
                                        
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Settlement of Dispute</h3>
                                    <p><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input8; ?>" ></p>
                                </div>
                            </div>



                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Tolerance</h3>
                                    <p><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input9; ?>" ></p>
                                    <p><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input10; ?>" ></p>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="payment-info">
                                    <h3 class="inv-title-1">Insurance, Taxes and other charges</h3>
                                    <ul class="bank-transfer-list-1">
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input11; ?>" ></li>
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input12; ?>" ></li>
                                        <li><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input13; ?>" ></li>
                                    </ul>
                                    <p><input type="text" class="form-control linetext" name="input_text[]" value="<?php echo $input14; ?>" ></p>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="terms-and-condistions">
                                    <h3 class="inv-title-1"><strong>Bank Details:</strong></h3>
                                    <p class="mb-0"><strong>Name: ZaronIndustriess</strong></p>
                                    <p class="mb-0"><strong>Bank: KARUR VYSYA BANK</strong></p>
                                    <p class="mb-0"><strong>Branch: AVINASHI</strong></p>
                                    <p class="mb-0"><strong>IFSC Code: KVBL0001643</strong></p>
                                    <p class="mb-0"><strong>Account No: 1643135000001944</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <h4 class="inv-title-1">For Wire Transfers</h4>
                                <p class="text-muted">From the time you place the funds transfer request with your local bank, it takes 24-48 banking hours for the funds to reach our account held with our correspondent bank. The Wire transfer will be processed and the money will be transferred to our account in 2 hour time.</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <h4 class="inv-title-1">Contact us</h4>
                                <p class="text-success">{{salesname}}</p>
                                <p class="text-success">{{salesphone}}</p>
                                <p class="text-success">{{salesphone2}}</p>
                            </div>
                        </div>


                    </div>
                    
                     
                    
                </div>
                <div class="invoice-btn-section clearfix d-print-none">
                   
                    <a href="javascript:window.print()" class="btn btn-lg btn-download">
                        <i class="fa fa-download"></i> Download Quotation
                    </a>
                    
                    <button type="submit" class="btn btn-lg btn-success">
                        <i class="fa fa-save"></i> SAVE
                    </button>
                </div>
                
                
                 </form>
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
        
        
       
        
  
      
        

        
       
    });

   

</script>
    




<script>

$(document).ready(function(){
    
   $("#autocomplete").focus();
  
    
  $(".closeaddon").click(function(){
    $('.right-bar').css("right", "-395px");
    $('.right-bar-2').css("right", "-395px");
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
    
    
    
    
    
    
    
    
    
    
    
    
    
     $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts = data;
     
      });
   
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetchproduct_full2",
      data:{'action':'fetch_single_data','order_no':'<?php echo $order_no; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){

          $scope.availableProducts2 = data;
     
      });
   
    
    
    $scope.completeProduct=function(){
    $( "#autocomplete" ).autocomplete({
      source: $scope.availableProducts
    });
    } 
    
    
    
    $scope.completeProduct2=function(id){
    $( "#product_name_"+id ).autocomplete({
      source: $scope.availableProducts2
    });
    } 
    
    
    
    
    
    
    
    
  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Create';

  $scope.submitCallBack = function(){


      



 $('#savecallback').html('Loading...');
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/callbacksave",
      data:{'call_status':$scope.call_status,'call_back_date':$scope.call_back_date,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','tablenamemain':'<?php echo $tablename; ?>'}
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


 

$scope.inputsave_1 = function (id,inputname) {


        
                      var fieds=inputname+'_'+id;
                      var values=$('#'+fieds).val();
                     
                     
                      var profile= parseFloat($('#profile_'+id).val());
                      var crimp= parseFloat($('#crimp_'+id).val());
                      var fact= parseFloat($('#fact_'+id).val());
                      var nos= parseFloat($('#nos_'+id).val());
                      var rate= parseFloat($('#rate_'+id).val());
                     
                      
                      var subqty = profile+crimp;
                      
                      
                      
                      var Meter_to_Sqr_feet = subqty/3.281;
                      var Meter_to_Sqr_feet = Meter_to_Sqr_feet.toFixed(2);
                      $('#Meter_to_Sqr_feet_'+id).val(Meter_to_Sqr_feet);
                      
                     
                      var sqt=Meter_to_Sqr_feet*fact;
                      
                      
                      
                      var sqt_qty=sqt*nos;
                      var sqt_qty = sqt_qty.toFixed(2);
                      $('#qty_'+id).html(sqt_qty+' <span class="td-info-icons td-qty-info"><i class="fas fa-info-circle"></i></span>');
                      var total=Math.round(rate*sqt_qty);
                      $('#amount_'+id).html(total);
                      
                      
                      
                    
                      
                      
                      
                      
            
                       $http({
                          method:"POST",
                          url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
                          data:{'inputname':inputname,'values':values,'id':id,'action':'InputUpdate','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                        }).success(function(data){
                    
                          if(data.error != '1')
                          {
                              
                              
                                  if(inputname=='product_name')
                                  {
                                       //$scope.fetchData();
                                       
                                  }
                                  
                                  

                                  $scope.fetchSingleDatatotal();
                              
                               
                          }
                             
                       });
                       
           
           
  

      

}
















$scope.saveDetails = function (event) {



if(event.keyCode==13)
{



    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/insertandupdate?order_id=<?php echo $order_id; ?>",
      data:{'product_id':$scope.product_id,'profile':$scope.profile,'order_no':'<?php echo $order_no; ?>','order_id':'<?php echo $order_id; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
      
        $scope.profile = "";
           
        $scope.fetchData();
        $scope.fetchSingleDatatotal();


      }

    });

}



}






$scope.saveCustomer = function (event) {



//if(event.keyCode==13)
//{
  
  
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

      }

    });
    
    
 }
 else
 {
     alert('Please fill Customer');
 }
    

//}



}




$scope.saveSales = function (event) {



 


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/salesteam?order_id=<?php echo $order_id; ?>",
      data:{'user_id':$scope.user_id,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

      if(data.error != '1')
      {

        
     
           
        $scope.fetchSingleDatatotal();

      }

    });
    
    





}



$scope.saveReason = function (event) {



 

if($scope.reason)
{
    


 if($scope.reason==1)
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
                     $scope.fetchCustomerorderdelevieryaddress();
                     $scope.fetchCustomerorcallbackhistroy();
                       
                    });
            
            
                
                <?php
            } ?>
            
      
           
        
     
     
 }
 else
 {
     
     
     
     
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/order/savereason?order_id=<?php echo $order_id; ?>",
          data:{'reason':$scope.reason,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','action':'Save','movetablename':'<?php echo $movetablename; ?>','old_tablename':'<?php echo $old_tablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
        }).success(function(data){
    
          if(data.error != '1')
          {
    
            
         
             alert('Reason updated');   
             $scope.fetchSingleDatatotal();
             $scope.fetchCustomerorderdata();
             $scope.fetchCustomerorderdelevieryaddress();
             $scope.fetchCustomerorcallbackhistroy();
            
            
    
          }
    
        });
        
     
     
     
     
 }


 
    
    
    
    
    
    
    
    
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
           
        $scope.fetchSingleDatatotal();

      }

    });
    
    
 }
 else
 {
     alert('Please input discount value');
 }
    

//}



}









  $scope.fetchData = function(){
   


    $http.get('<?php echo base_url() ?>index.php/order/fetch_data_commission?order_id=<?php echo $order_id; ?>&tablenamemain=<?php echo $tablename; ?>&tablename_sub=<?php echo $tablename_sub; ?>&convert=1').success(function(data){
      $scope.namesData = data;
    });
    
   
  
   
  };

 
 
$scope.fetchSingleDatatotal = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/order/fetch_single_data_total?order_id=<?php echo $order_id; ?>",
      data:{'action':'fetch_single_data','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
    }).success(function(data){

       $scope.fulltotal = data.fulltotal;
       
       
       if(!data.order_no_id)
       {
             $scope.order_no_id = '<?php echo $order_no; ?>';
       }
       else
       {
           $scope.order_no_id = data.order_no_id;
          
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
       $scope.commissiontotal = data.commission;
       $scope.discountfulltotal = data.discountfulltotal;
       $scope.Meter_to_Sqr_feet = data.Meter_to_Sqr_feet;
      $scope.amounttotal_with_out_commission = data.amounttotal_with_out_commission;
     
       $scope.fullqty = data.fullqty;
       $scope.FACT = data.FACT;
       $scope.UNIT = data.UNIT;
       $scope.NOS = data.NOS;
     
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
       
       
       $scope.credit_limit = data.credit_limit;
       $scope.fulltotal_usage = data.fulltotal_usage;
       $scope.credit_period = data.credit_period;
       
       $scope.ratings = data.ratings;
       $scope.useage = data.useage;
       $scope.approx_id = data.approx;
       
       
       $scope.order_base = data.order_base;
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
  
  
  


    $scope.checkVal = function(){
        
        
         var status=$('input[name="checkboxEl"]:checked').val();
         
         
           if($('input[name="checkboxEl"]').prop("checked") == true){
                   if(confirm("Are you sure you want to move it?"))
                   {
                       var deleteid=0;
                       $('#firstmodal').modal('toggle');
                   }
                   else
                   {
                        var deleteid=1;
                   }
            }
            else
            {
                var deleteid=1;
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_move",
              data:{'status':'1','order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
               
               
             
              
               
            });
        
        
     
    }
    
    
    
    
    $scope.checkValRequiest = function(){
        
        
             var status=$('input[name="checkapproved"]:checked').val();
             
             
           
         
         
            if($('input[name="checkapproved"]').prop("checked") == true){
               
               if(confirm("Are you sure you want to move it?"))
               {
                   var deleteid=3;
                   $('#firstmodal3').modal('toggle');
               }
               else
               {
                    var deleteid=0;
               }
               
                
            }
            else
            {
                var deleteid=0;
            }


       
            $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
              data:{'status':status,'order_id':'<?php echo $order_id; ?>','order_no':'<?php echo $order_no; ?>','deleteid':deleteid,'movetablename_sub':'<?php echo $movetablename_sub; ?>','movetablename':'<?php echo $movetablename; ?>','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
            }).success(function(data){
            });
        
        
     
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
       
        $scope.fetchData();
         $scope.fetchSingleDatatotal();
         
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
       
         $scope.fetchData();
         $scope.fetchSingleDatatotal();
         $scope.fetchCustomerorderdata();
         
      }); 
    //}
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
       
          $scope.fetchData();
          $scope.fetchSingleDatatotal();
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
                   
                      $scope.fetchData();
                      $scope.fetchSingleDatatotal();
                     
            
                  }); 
               }
               else
               {
                   alert('Please fill number');
               }


}

};




$scope.approvedFinance = function(id,status,reason){
    
            
                    if(status==-1)
                    {
                        if(confirm("Are you sure you want to reject?"))
                        {
                            $('#firstmodal2').modal('toggle');
                            
                            
                            var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    else
                    {
                        
                         if(confirm("Are you sure you want to approved?"))
                        {
                            $('#firstmodal1').modal('toggle');
                            
                            
                            
                           var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    
                    
                    
                    if(result==1)
                    {
                        
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/order/order_quotation_request_finance",
                                data:{'order_id':id,'reason':reason,'order_no':id,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                               }).success(function(data){
                               
                                $scope.fetchData();
                                 $scope.fetchSingleDatatotal();
                                 
                              }); 
                        
                        
                    }
                    
                    
                    
                   
                    
                    
                      
          
};


$scope.approved = function(id,status,reason){
    
    
                    if(status==-1)
                    {
                        if(confirm("Are you sure you want to reject?"))
                        {
                            $('#firstmodal2').modal('toggle');
                            
                            
                            var result=1;
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
                    else
                    {
                        
                         if(confirm("Are you sure you want to approved?"))
                        {
                            $('#firstmodal1').modal('toggle');
                            
                            
                            
                           var result=1;
                           
                           
                        }
                        else
                        {
                            var result=0;
                        }
                        
                         
                    }
    
                    if(result==1)
                   {
                      $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/order/order_quotation_request",
                        data:{'order_id':id,'reason':reason,'order_no':id,'status':status,'deleteid':status, 'action':'Deletesub','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
                      }).success(function(data){
                       
                        $scope.fetchData();
                         $scope.fetchSingleDatatotal();
                         
                      }); 
                   }
};



$scope.copyData = function(id){
    //if(confirm("Are you sure you want to copy it?"))
    //{
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/order/insertandupdate",
        data:{'id':id, 'action':'Copy','tablenamemain':'<?php echo $tablename; ?>','tablename_sub':'<?php echo $tablename_sub; ?>'}
      }).success(function(data){
       
         $scope.fetchData();
         $scope.fetchSingleDatatotal();

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
