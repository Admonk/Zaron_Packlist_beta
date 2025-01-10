<?php  
if($staatusby==1)
{
    echo "<h3>Link as been expreied!</h3>";
    exit;
}

include "header.php";

?>
<style>
#dis_acc {
    line-height: 40px;
}
#page-topbar {
    display: none;
}
</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>


 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                      <img src="http://erp.zaron.in/assets/logo.svg" alt="" height="24">

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  <div class="card-body" >











<form id="pristine-valid-example" novalidate method="post"></form>



                                        










                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">
                    

    

                       <div class="row">
                           
                           
                         
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"><h4>Address Details : <span style="color:red;">*</span></h4> </label>
                            <div class="col-sm-12">
                            
                            
                            
                            <?php
                            
                            foreach($vendor as $valuep)
                            {
                                $name=$valuep->name;
                                 $email=$valuep->email;
                                 $phone=$valuep->phone;
                                 $gst=$valuep->gst;
                                 $address=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                 	     
                               
                            }
                            
                            
                            ?>
                            
                            <p><?php echo $name; ?></p>
                            <p><?php echo $phone; ?> <?php echo $email; ?></p>
                            <p><?php echo $gst; ?></p>
                            <p><?php echo $address ?></p>
                               
                            
                            
                            
                          
                             
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                           
                            <div class="col-sm-12">
                            
                            
                            
                               <?php
                                
                                foreach($purchase_orders_process as $vvl)
                                {
                                    
                                     $purchase_product_list_id[]= $val->id;
                                    $order_no=$vvl->order_no;
                                    $create_date=$vvl->create_date;
                                }
                                
                                   $purchase_product_list_ids=implode('|', $purchase_product_list_id);
                                ?>
                                
                                
                               <p><b>Request No : </b> <?php echo $order_no; ?></p>
                               <p><b>Request Date : </b> <?php echo date('d-m-Y',strtotime($create_date)); ?></p>
                           
                            
                            
                          
                             
                            </div>
                          </div>
                        </div>
                        
                        
                      </div>


                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
         <div class="row">
              <label class="col-sm-12 col-form-label"><h4>Product Details <span style="color:red;">*</span></h4> </label>
             <table class="table border">
                 <tr>
                     <th>Product Name</th>
                     <th>Specifications</th>
                     <th>UNIT</th>
                     <th>QTY</th>
                     <th>Base Price</th>
                     <th>Total Amount</th>
                 </tr>
                 
                     <?php
                     $totalqty=0;
                     $subtotaloverall=0;
                     $extra=0;
                     foreach($purchase_product_list_process as $val)
                     {
                       
                          $totalqty+=  $val->qty;
                       
                          $price=0;
                          $subtotal=0;
                          
                          foreach($purchase_order_quotation as $vals)
                           {
                             if($vals->purchase_product_list_id==$val->id)
                             {
                                $price=$vals->price; 
                             }
                            $subtotal= $price*$val->qty;
                            
                            if($vals->extra!='')
                            {
                                 $extra=$vals->extra;
                            }
                           
                            
                          }
                       
                       $subtotaloverall+=$subtotal;
                     ?>
                               
                                <tr>
                                     <th><?php echo $val->product_name; ?></th>
                                     <th><?php echo $val->specifications; ?></th>
                                     <th><?php  
                                                      if($val->uom=='1'){ echo 'TON';  } 
                                                      if($val->uom=='2'){ echo 'SQ.MTR';  } 
                                                      if($val->uom=='3'){ echo 'FEET';  } 
                                                      if($val->uom=='4'){ echo 'MM';  } 
                                                      if($val->uom=='5'){ echo 'MTR';  } 
                                                      if($val->uom=='6'){ echo 'INCH';  } 
                                                      if($val->uom=='7'){ echo 'KG';  } 
                                                      if($val->uom=='8'){ echo 'SQ.FT';  } 
                                                      if($val->uom=='9'){ echo 'NOS';  } 
                                         
                                    
                                     
                                      ?>
                                     </th>
                                     <th><?php echo $val->qty; ?></th>
                                     <th>
                                         
                                         <input  style="width: 60%;" class="form-control price"  onkeypress="return isNumberKey(event)" value="<?php echo $price; ?>" data-value="<?php echo $val->qty; ?>" data-id="<?php echo $val->id; ?>" name="price"  required  type="text">
                                         <input  style="width: 60%;"  value="<?php echo $val->id; ?>" class="form-control purchase_product_list_id" name="purchase_product_list_id" type="hidden">
                                     
                                     </th>
                                     
                                     <th class="totalv" id="dd_<?php echo $val->id; ?>"> <?php echo $subtotal; ?></th>
                                     
                                </tr>
                               
                     <?php 
                     } 
                     ?>
               
                
                
                <?php
                
                  $subtotal= $subtotaloverall;
                
                if($extra==0)
                {   
                    $active="d-none";
                    
                    ?>
                     <tr id="showextra" style="display:none;">
                    <?php
                }
                else
                {
                    
                    $active="";
                    ?>
                     <tr id="showextra" style="display:none;">
                    <?php
                }
                ?>
               
                                      <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th><b>Extra per unit (KG/ton) :</b></th>
                                     <th id="totalextra"><?php echo $extra; ?></th>
               </tr>
               
               <tr>
                                      <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th><b>Sub Total :</b></th>
                                     <th id="totalamount"><?php echo $subtotal; ?></th>
               </tr>
               
               
              
               
               <tr>
                                      <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th><b>GST 18 % </b</th>
                                     <th id="gst"><?php $gst=round($subtotal*18/100,2); echo $gst; ?></th>
                                     
                                    
               </tr>
               
               <tr>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th><b>Total :</b></th>
                                     <th id="totalamountgst"><?php echo round($gst+$subtotal,2); ?></th>
               </tr>
                 
                 
             </table>
             </div>             
                     
                     
                     
                     
                     
                     
                     
                     


                        <div class="row">
                       
                        <h4>Other Details <span style="color:red;">*</span></h4>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">If Attachement 
                            
                            <?php
                            if($attachement!='')
                            {
                                ?>
                                
                                <a href="<?php echo base_url(); ?><?php echo $attachement; ?>" target="_blank">Link</a>
                            
                                <?php
                            }
                            ?>
                            
                            </label>
                            <div class="col-sm-12">
                              <input type="file" style="padding:9px;" file-input="files" class="form-control"  id="fileupload">
                              
                            </div>
                          </div>
                        </div>
                        
                        
                       
                        
                         
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Freight   </label>
                            <div class="col-sm-12">
                           <select  id="extra_included"  class="form-control" ng-model="extra_included" name="extra_included">
                                                                                   
                                                                                    <option value="Included">Included</option>
                                                                                    <option value="Extra">Extra</option>
                                                                                    
                           </select>
                             
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3 <?php echo $active; ?>" id="displayextracharge" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Extra per unit (KG/ton) </label>
                            <div class="col-sm-12">
                             <input id="extra" class="form-control" name="extra"    ng-model="extra" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Delivery time </label>
                            <div class="col-sm-12">
                             <input id="timeline" class="form-control" name="timeline"    ng-model="timeline" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Payment terms  </label>
                            <div class="col-sm-12">
                             <select class="form-control" name="payment_terms" id="payment_terms" ng-model="payment_terms">
                                 <option value="Advance">Advance</option>
                                 <option value="Credit">Credit</option>
                             </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3" id="displaydate" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Due Date  </label>
                            <div class="col-sm-12">
                            <input id="due_date" class="form-control" name="due_date"  value="<?php echo date('Y-m-d'); ?>"  type="date">
                            </div>
                          </div>
                        </div>
                      
                        
                       </div>
        
                     



                                                
                       <div class="row">
                    

                        <div class="col-md-12" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Remarks</label>
                            <div class="col-sm-12">
                             <textarea id="remarks" class="form-control"  name="remarks" ng-model="remarks" rows="6" ></textarea>
                            </div>
                          </div>
                        </div>
                        
                        
                      

                    
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                            
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>



                      </div>



                       






                      


                    </form>


                       
                       <br>
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




                  </div>
                </div>
              </div>
            </div>

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>















<script>
$(document).ready(function(){
    
    
    
      $('#extra_hold').on('input',function () {   
       var totalextra=parseFloat($(this).val()); 
       
       $('#totalextra').html(totalextra);
       
       
       
       
       
       
       
       
       
       
       
       
       
       
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       
                                                                                     
                                                                                       
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
       
       
       
       
       
       
       
       
       
       
       
     
       
    });
    
    $('#extra_included').on('change',function(){
        
       
       var val=$(this).val(); 
       if(val=='Extra')
        {
            $('#displayextracharge').show();
            $('#showextra').hide();
            $('#displayextracharge').removeClass('d-none');
            //var totalextra=parseFloat($('#totalextra').html());
            var totalextra=0;
            $("#extra").val(totalextra);
        }
        else
        {
            
            $('#displayextracharge').hide();
            $("#extra").val('0');
            $('#showextra').hide();
            var totalextra=0;
            
            
        }
        
        
        
                                                                                         
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       
                                                                                       
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
        
        
        
        
        
    });
    
    
      $('#payment_terms').on('change',function(){
        
       
       var val=$(this).val(); 
       if(val=='Credit')
        {
            $('#displaydate').show();
        }
        else
        {
            $('#displaydate').hide();
        }
    });
    
    
    
    
    
    
    
    
    
      $('.price').on('input',function () {
          
            var val= $(this).val();
            var qty= $(this).data('value');
            var id= $(this).data('id');
            var totl=qty*val;
            var totl=totl.toFixed(2);
            $('#dd_'+id).html(totl);
          
            
            
                                                                                         //var totalextra=parseFloat($('#totalextra').html());
                                                                                         
                                                                                         var totalextra=0;
                                                                                         
                                                                                         var sum = 0
                                                                                         $('.totalv').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).html()=='')
                                                                                                {
                                                                                                    var combat = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var combat = parseFloat($(this).html());
                                                                                                }
                                                                                                    
                                                                                               sum += parseFloat(combat);
                                                                                               
                                                                                             
                                                                                       });
                                                                                       
                                                                                       
                                                                                       var totalsum=sum+totalextra;
                                                                                       
                                                                                       
                                                                                       var totalgst=totalsum*18/100;
                                                                                       var totalgst=totalgst;
                                                                                       var sumva=totalsum.toFixed(2);
                                                                                       $('#totalamount').html(sumva);
                                                                                       
                                                                                      
                                                                                       var Totalss=totalgst.toFixed(2);
                                                                                       
                                                                                       $('#gst').html(Totalss);
                                                                                       
                                                                                       
                                                                                       var Total=totalgst+totalsum;
                                                                                       var Total=Total.toFixed(2);
                                                                                       
                                                                                       $('#totalamountgst').html(Total);
            
           
                                                                                    
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
    
    
    
    
    
    
    

$scope.success = false;
$scope.error = false;


$scope.submit_button = 'Save';
$scope.input_label=0;
$scope.extra='<?php echo $extra;  ?>';
$scope.extra_included='<?php echo $extra_included;  ?>';
$scope.timeline='<?php echo $timeline;  ?>';
$scope.payment_terms='<?php echo $payment_terms;  ?>';
 $scope.remarks='<?php echo $remarks;  ?>';
 
 
  $scope.submitForm = function(){
      
      

if (confirm("Are you confirm to Save?") == true) {
  

      $scope.submit_button = 'Loading';
      
      
      var payment_terms= $('#payment_terms').val();
      var due_date= $('#due_date').val();
      
      
      
      
      
      var sortingInput = $(".price");
      var price_value = [];
      for(var i = 0; i < sortingInput.length; i++){
          
           price_value.push($(sortingInput[i]).val());
         
      }
      var pricevalues= price_value.join("|");
      
      
      
        var purchase_product_list_id = $(".purchase_product_list_id");
      var purchase_product_list_ids = [];
      for(var i = 0; i < purchase_product_list_id.length; i++){
          
           purchase_product_list_ids.push($(purchase_product_list_id[i]).val());
         
      }
      var purchase_product_list_ids_value= purchase_product_list_ids.join("|");
      
  
      var extra = $("#extra").val();
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/vendorpriceupdate",
      data:{'remarks':$scope.remarks,'extra_included':$scope.extra_included,'extra':extra,'timeline':$scope.timeline,'payment_terms':payment_terms,'due_date':due_date,'price':pricevalues,'purchase_product_list_ids':purchase_product_list_ids_value,'order_id':'<?php echo $order_id; ?>','vendor_id':'<?php echo $vendor_id; ?>','action':$scope.submit_button,'tablename':'purchase_order_quotation'}
     }).success(function(data){
       
      if(data.error != '1')
      {
          if(data.error=='3')
          {

              $scope.success = false;
              $scope.error = true;
              
              $scope.errorMessage = data.massage;

          }
          else
          {
              
              
                              $scope.inserthistory(3,'Vendor Quotation filled','<?php echo $vendor_id; ?>');  
               
              
                              var filetype=0;
              
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_set?id='+data.insert_id+'&filetype='+filetype, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    
                               });  
                               

            $scope.success = true;
            $scope.error = false;
            $scope.price = "";
            $scope.extra = "";
            $scope.remarks = "";
            $('#fileupload').val();
            $scope.successMessage = data.massage;
            $scope.submit_button = 'Save';

          }

          

      }

       
    });

      
      
  }
      
  };

$scope.inserthistory = function(order_process,processtext,vendor_id){
    
                           $http({
                            method:"POST",
                            url:"<?php echo base_url() ?>index.php/purchase/order_process_history",
                            data:{'order_id':'<?php echo $order_id; ?>','order_process':order_process,'processtext':processtext,'vendor_id':vendor_id}
                           }).success(function(data){
                           
                          }); 
                          
    
};


});

</script>
<script language=Javascript>
    
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
    </script>
    <?php include ('footer.php'); ?>
</body>


