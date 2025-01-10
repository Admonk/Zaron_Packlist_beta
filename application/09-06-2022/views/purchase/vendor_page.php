<?php  include "header.php"; ?>
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
                            <label class="col-sm-12 col-form-label"><h4>Product Details <span style="color:red;">*</span></h4> </label>
                            <div class="col-sm-12">
                            
                            
                            
                            <?php
                            
                            foreach($purchase_orders_process as $vvl)
                            {
                                $order_no=$vvl->order_no;
                                $create_date=$vvl->create_date;
                            }
                            
                            
                            ?>
                               <p><b>Request No : </b> <?php echo $order_no; ?></p>
                               <p><b>Request Date : </b> <?php echo date('d-m-Y',strtotime($create_date)); ?></p>
                            <?php
                            $purchase_product_list_id=array();
                            foreach($purchase_product_list_process as $val)
                            {
                                
                                 $purchase_product_list_id[]= $val->id;
                                ?>
                                
                                     <p><b>Product Name : </b> <?php echo $val->product_name; ?></p>
                                     <p>
                                     
                                     <?php
                                     
                                     if($val->specifications!='')
                                     {
                                         ?>
                                         <b>Specifications : </b><?php echo $val->specifications; ?>
                                     
                                         <?php
                                     }
                                     
                                     ?>
                                     
                                     
                                     <b>UNIT :</b> <?php 
                                     
                                     if($val->uom=='1')
                                     {
                                         echo 'TON';
                                     }
                                     else
                                     {
                                         echo 'KG';
                                     }
                                     
                                     ?>
                                     <b>QTY :</b> <?php echo $val->qty; ?></p>
                             
                                
                                <?php
                            }
                            
                            
                             $purchase_product_list_ids=implode('|', $purchase_product_list_id);
                            
                            
                            ?>
                            
                            
                          
                             
                            </div>
                          </div>
                        </div>
                        
                        
                      </div>


                     
 <div class="row">
                       
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price  <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control" name="price"   required ng-model="price" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">If Attachement </label>
                            <div class="col-sm-12">
                              <input type="file" style="padding:9px;" file-input="files" class="form-control"  id="fileupload">
                            </div>
                          </div>
                        </div>
                  </div>     


                        <div class="row">
                       
                        <h4>Other Details <span style="color:red;">*</span></h4>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Timeline (Days) </label>
                            <div class="col-sm-12">
                             <input id="timeline" class="form-control" name="timeline"    ng-model="timeline" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Freight included or extra  </label>
                            <div class="col-sm-12">
                           <select  id="extra_included"  class="form-control" ng-model="extra_included" name="extra_included">
                                                                                    <option value="">Select</option>
                                                                                    <option value="YES">YES</option>
                                                                                    <option value="NO">NO</option>
                                                                                    
                           </select>
                             
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3" id="displayextracharge" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Extra </label>
                            <div class="col-sm-12">
                             <input id="extra" class="form-control" name="extra"    ng-model="extra" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Payment terms  </label>
                            <div class="col-sm-12">
                             <select class="form-control" name="payment_terms" id="payment_terms">
                                 <option value="Advance">Advance</option>
                                 <option value="Credit">Credit</option>
                             </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
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
    
    $('#extra_included').on('change',function(){
        
       
       var val=$(this).val(); 
       if(val=='NO')
        {
            $('#displayextracharge').show();
        }
        else
        {
            $('#displayextracharge').hide();
        }
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
$scope.extra=0;


 
 
  $scope.submitForm = function(){
      
      $scope.submit_button = 'Loading';
      
      
      var payment_terms= $('#payment_terms').val();
      var due_date= $('#due_date').val();
      
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/purchase/vendorpriceupdate",
      data:{'remarks':$scope.remarks,'extra_included':$scope.extra_included,'extra':$scope.extra,'timeline':$scope.timeline,'payment_terms':payment_terms,'due_date':due_date,'price':$scope.price,'purchase_product_list_ids':'<?php echo $purchase_product_list_ids; ?>','order_id':'<?php echo $order_id; ?>','vendor_id':'<?php echo $vendor_id; ?>','action':$scope.submit_button,'tablename':'purchase_order_quotation'}
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
                              var filetype=0;
              
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file', file);  
                               });  
                               
                               
                               $http.post('<?php echo base_url() ?>index.php/purchase/fileuplaodbyorder_set?id='+data.insert_id+'filetype='+filetype, form_data,  
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

      
      
  };



});

</script>
    <?php include ('footer.php'); ?>
</body>


