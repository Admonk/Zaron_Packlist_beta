<?php  include "header.php"; ?>
<style>
        #pristine-valid-common2 .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
         }
         .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.val{color: #ee5c17;}
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
                                    <h4 class="mb-sm-0 font-size-18">Ledger   Edit</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#">Ledger list</a></li>
                                            <li class="breadcrumb-item active"> Ledger Forms Edit</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                   <!--<div class="card-header1">-->
                   <!--<a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>-->
                   <!--</div>-->
                  <div class="card-body" ng-init="fetchData()">


            



































<form id="pristine-valid-example" novalidate method="post"></form>



                                        










                   
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    
                    
                    <?php
                    $account_heads_id_multipel=array();
                    foreach($accountheads as $head)
                    {
                        $account_heads_id_multipel_set=$head->account_heads_id_multipel;
                        $account_heads_id=$head->account_heads_id;
                        if($account_heads_id_multipel_set!=0)
                        {
                            $account_heads_id_multipel=explode('|', $account_heads_id_multipel_set);
                        }
                        else
                        {
                           $account_heads_id_multipel=explode('|', $account_heads_id);
                        }
                        
                        
                    }
                    
                   
                    ?>
                 



                       <div class="row">
                           
                           
                           
                            <div class="col-md-3" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label">Sub Group <span style="color:red;">*</span></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control"  required  data-trigger multiple place id="account_heads_id" name="account_heads_id"  >
                                                                
                                                                
                                                                <option value="">Select</option>
                                                              <?php
                                                              foreach ($accounttype as $val)
                                                              { 
                                                                  if(in_array($val->id, $account_heads_id_multipel))
                                                                  {
                                                                   ?>
                                                                    <option selected value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                              
                                                                   <?php
                                                                  }
                                                                  else
                                                                  {
                                                                      ?>
                                                                       <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                              
                                                                      <?php
                                                                  }
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>
                           
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="company_name" class="form-control" required name="company_name" ng-model="company_name" type="text">
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-3" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Opening Balance </label>
                            <div class="col-sm-12">
                             <input id="opening_balance" class="form-control" name="opening_balance" ng-model="opening_balance" type="opening_balance">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Payment Status </label>
                            <div class="col-sm-12">
                                
                                 <select class="form-control" name="payment_status" id="payment_status" required ng-model="payment_status">

                                 <option value="1">CR</option>
                                 <option value="2">DR</option>

                              </select>
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST Status </label>
                            <div class="col-sm-12">
                                
                                 <select class="form-control" name="gst_status" id="gst_status" required ng-model="gst_status">

                                 <option value="1">GST Holder</option>
                                 <option value="2">NON GST Holder</option>

                              </select>
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3" id="gst_view">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">GST </label>
                            <div class="col-sm-12">
                             <input id="gst" class="form-control" name="gst"    ng-model="gst" type="gst">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Address</label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1"  ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                  
                     
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode </label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" name="pincode"  ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone </label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone"    ng-model="zone" type="zone">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City </label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" name="city"  ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality </label>
                            <div class="col-sm-12">
                                
                                
                                
                 <input type="text" class="form-control" ng-model="locality" ng-keyup="completeLocalty()"  placeholder="Search locality"  id="localitybase">
          
                                
                             
                                
                            
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State </label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"    ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                    
    <?php
                        
                        foreach($additional_information as $vvl)
                        {
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-3" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                              <?php
                                                              for ($i=0; $i <count($option) ; $i++)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $option[$i] ?>"><?php echo $option[$i] ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>
                            <?php
                            
                                     }
                                     else
                                     {
                                         
                                         $tpebase= $vvl->type;
                                         
                                         if($tpebase=='Date')
                                         {
                                             $vv='date';
                                         }
                                         else
                                         {
                                             $vv='text';
                                         }
                                         
                                         ?>
                                         
                                           <div class="col-md-3" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                        
                        
                      </div>








                   

                 



                        

                      <h4 class="card-title mt-3">Contact Details </h4>
                     <div class="row">


                       <div class="col-md-3" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Sales Group <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <select class="form-control" name="sales_group" required ng-model="sales_group">

                              <option value="0"> Select Sales Group</option>

                              <?php
                                foreach ($user_group as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                       <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="phone" class="form-control" name="phone" required ng-model="phone" type="text" >
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landline No</label>
                            <div class="col-sm-12">
                              <input id="landline" class="form-control" ng-model="landline" name="landline" type="text">
                            </div>
                          </div>
                        </div>


                           <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                              <input id="email" class="form-control" name="email" ng-model="email" type="email">
                            </div>
                          </div>
                        </div>


                        
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                 
                        
                        
                        
                        
                        
                        
                        
                        
                          
                     
                     <div class="row">

                      

                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>
                        
                      </div>


                       
                      
                    </form>
<br><br>
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









 <div class="modal fade exampleModalToggleLabel" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Add new field</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                           <form id="pristine-valid-common2" ng-submit="submitFormmaster()" method="post">
                      








 <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Lable name <small style="color:red;">(No Space OR Use Space to _ )</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control" required  ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="typebase">
                                  <option value=""> Select Type</option>
                                  <option value="Input Open field">Input Open field</option>
                                  <option value="Multiple Options">Multiple Options</option>
                                  <option value="Date">Date</option>
                              </select>

                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-12" id="optionset" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Maulti Option <small>Input value with (,)</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control"   ng-model="option" name="option" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Grouping</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control" required  ng-model="grouping">
                                  
                                  <?php 
                                  foreach($grouping as $val)
                                  {  
                                      if($val->id==8)
                                      {
                                          
                                      
                                      ?>
                                      <option value="<?php echo $val->id; ?>"> <?php echo $val->name; ?></option> 
                                      <?php
                                      
                                      }
                                  }
                                  
                                  ?>
                              </select>

                            </div>
                          </div>
                        </div>

                       <div class="col-md-12">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                
                                  <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="Create">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>








<script type="text/javascript">    












$(document).ready(function () {   
    
    
    
    
    
    
    
     $(".typeset").click(function(){
   
   var a= $(this).val();
   
   if(a=='Multiple Options')
   {     
       $('#optionset').show();
       
   }
   else
   {
        $('#optionset').hide();
   }
    
    
  });
    
    
     $("#gst_status").on('change',function(){
   
              var a= $(this).val();
   
                   if(a=='1')
                   {     
                       $('#gst_view').show();
                       
                   }
                   else
                   {
                        $('#gst_view').hide();
                   }
                    
    
       });
    
    
    $('input[type=text]').on('input', function()
         {

                
                 var inputValue = $(this).val();
                 var uppercaseValue = inputValue.toUpperCase();
                 $(this).val(uppercaseValue);


                 const sectionId = $(this).data('section');
                 updateProgress(sectionId);



 });
    
    
$("#gst").change(function () {    
                var inputvalues = $(this).val();    
                var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    //$("#gst").val('');    
                    //$("#gst").focus();    
                }    
            });          
 });          
</script> 

<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Update';

$scope.grouping=8;
$scope.gst_status=1;
$scope.sales_group=0;

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

 
$scope.submitFormmaster = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'type':$scope.typebase,'option':$scope.option,'grouping':$scope.grouping,'id':1,'action':'Add','tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
       
       
         alert('Created..');
         location.reload();
        
      }



    });
  };

 

  $scope.submitForm = function(){
      
      
  
    
   
   
    var account_heads_id=$('#account_heads_id').val();
    

      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
      data:{'status':'1',
      <?php
      foreach($additional_information as $vl)
      {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
       }
      ?>
      'gst_status':$scope.gst_status,'account_heads_id':account_heads_id,'opening_balance':$scope.opening_balance,'payment_status':$scope.payment_status,'phone':$scope.phone,'zone':$scope.zone,'locality':$scope.locality,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'company_name':$scope.company_name,'gst':$scope.gst,'landline':$scope.landline,'email':$scope.email,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'accountheads'}
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

              alert(data.massage);
              window.close();
          

          }

          

      }

       
    });
  };




  
$scope.Seletvendor = function () {
      
      
           $http({
           method:"POST",
           url:"<?php echo base_url() ?>index.php/vendor/fetch_single_data",
           data:{'id':$scope.seletvendor,'action':'fetch_single_data','tablename':'vendor'}
           }).success(function(data){
    
             $scope.company_name = data.name;
             $scope.email = data.email;
             $scope.phone = data.phone;
             $scope.gst = data.gst;
             $scope.status = data.status;
             $scope.address1 = data.address1;
             $scope.address2 = data.address2;
             $scope.landmark = data.landmark;
             
             $scope.pincode = data.pincode;
             $scope.city = data.city;
             $scope.state = data.state;
             $scope.landline = data.landline;
             
             
         
          });
      
      
};   
  
  
  
  
  $scope.completeLocalty=function(){
    $( "#localitybase" ).autocomplete({
      source: $scope.availableTags
    });
    }; 
    




    $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/customer/customer_search_full_locality",
      data:{'action':'fetch_single_data','order_no':'SU120/E/2/2022','tablename_sub':'order_product_list'}
    }).success(function(data){

          $scope.availableTags = data;
     
    });
  
$scope.fetchData = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/accountheads/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'accountheads'}
    }).success(function(data){

        $scope.name = data.name;
        $scope.email = data.email;
        $scope.phone = data.phone;
        $scope.company_name = data.company_name;
        $scope.gst = data.gst;
        $scope.gst_status = data.gst_status;
        
        if(data.gst_status==2)
        {
            $('#gst_view').hide();
        }
        
        
        
                  $('#ratings').val(data.ratings);
                   $('#feedback1').val(data.price_rateings);
                    $('#feedback2').val(data.delivery_time_rateings);
                     $('#feedback3').val(data.quality_rateings);
                      $('#feedback4').val(data.response_commission);
                      
        
        
        $scope.sales_group = data.sales_group;
        $scope.sales_team_id = data.sales_team_id;
        $scope.hidden_id = data.id;
        
        
        $scope.credit_period = data.credit_period;
 $scope.opening_balance = data.opening_balance;
               $scope.payment_status = data.payment_status;
        $scope.pin = data.pin;
        $scope.address1 = data.address1;
        $scope.address2 = data.address2;
        $scope.landmark = data.landmark;
        $scope.pincode = data.pincode;
        $scope.google_map_link = data.google_map_link;
        
        
        SetRatingStar();
        
        
        
        
         
         
         
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  
                                  if($label_name=='mdbirthday')
                                  {
                                       ?>
                                      $scope.<?php echo $label_name; ?> =new Date(data.<?php echo $label_name; ?>);
                                      <?php
                                  }
                                  else
                                  {
                                      ?>
                                      $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                                      <?php
                                  }
                                  
                                  
                                  
                                 }
                                 ?>
        
        
        
        
        
        $scope.zone = data.zone;
        $scope.feedback_details = data.feedback_details;
        $scope.feedback = data.feedback_sub;
        $scope.credit_limit = data.credit_limit;
      

        $scope.locality = data.locality;

        //$scope.account_heads_id= data.account_heads_id;

        $scope.city = data.city;
        $scope.state = data.state;
        $scope.landline = data.landline;
      


     
    });
};




});

</script>



<script>
    
var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('#'+$(this).data('value')).val()) >= parseInt($(this).data('rating'))) {
        
      return $(this).removeClass('val').addClass('fa-star val');
      
    } else {
        
      return $(this).removeClass('val').addClass('fa-star');
      
    }
  });
};

$star_rating.on('click', function() {
   $star_rating.siblings('#'+$(this).data('value')).val($(this).data('rating'));
   return SetRatingStar();
});

SetRatingStar();



</script>

    <?php include ('footer.php'); ?>
</body>

<script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>


