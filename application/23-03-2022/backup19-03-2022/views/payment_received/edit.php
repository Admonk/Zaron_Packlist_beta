<?php  include "header.php"; ?>
<style>
#dis_acc {
    line-height: 40px;
}

 canvas {
         display: block;
         touch-action: none;
         width: 1120px !important;
         padding: 12px;
         }
         

         div#canvas {
            margin: 18px 0px;
        }
         
         fieldset > * {
         display: inline-block;
         vertical-align: middle;
         }
         legend {
         font-weight: bold;
         font-size: 1.5rem;
         }
        
         input[type=color] {
         height: 0;
         position: absolute;
         top: -800px;
         width: 0;
         }
         .toolbar {
         color: var(--primary);
         display: flex;
         flex-wrap: wrap;
         left: 0;
         position: absolute;
         top: 0;
         width: 100%;
         display: none;
         }
         .toolbar__group {
         background-color: rgba(0, 0, 0, 0.85);
         flex-grow: 1;
         padding: 10px 15px 20px;
         }
         .toolbar__heading {
         margin-bottom: 0.5em;
         }
         .toolbar__option {
         margin-right: 1rem;
         }
         .toolbar__button {
         --dimension: 3rem;
         border: 1px solid currentColor;
         color: var(--static);
         cursor: pointer;
         display: inline-block;
         height: var(--dimension);
         line-height: 1;
         position: relative;
         overflow: hidden;
         text-indent: 60px;
         vertical-align: middle;
         width: var(--dimension);
         }
         .toolbar__button::before {
         background-color: currentColor;
         content: "";
         display: block;
         left: 50%;
         position: absolute;
         top: 50%;
         }
         .toolbar__option--color .toolbar__button {
         border: none;
         }
         .toolbar__button[for=line]::before {
         height: 70%;
         transform: translate(-50%, -50%) rotate(45deg);
         width: 2px;
         }
         .toolbar__button[for=rectangle]::before {
         height: 45%;
         transform: translate(-50%, -50%);
         width: 45%;
         }
         .toolbar__button[for=circle]::before {
         border-radius: 100%;
         height: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         }
         .toolbar__button[for=polygon]::before {
         background-color: transparent;
         border-bottom: 1.3rem solid currentColor;
         border-left: 0.75rem solid transparent;
         border-right: 0.75rem solid transparent;
         display: block;
         height: 0;
         transform: translate(-50%, -54%);
         width: 0;
         }
         input:checked + .toolbar__button {
         background-color: #777;
         color: var(--active);
         }
         .toolbar__label {
         margin-right: 0.5rem;
         }
         .toolbar__sub-group {
         margin-left: 1rem;
         opacity: 0.3;
         }
         input:checked + .toolbar__button + .toolbar__sub-group {
         opacity: 1;
         }
         #clear {
         position: absolute;
         right: 30px;
         top: 10px;
         }
         #saveServer
         {
         position: absolute;
         right: 100px;
         top: 10px;
         }
         #pristine-valid-common .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
         }
         #pristine-valid-common2 .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
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
                                    <h4 class="mb-sm-0 font-size-18">Edit Payment </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Payment Edit !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

     

                                    <div class="row">
                                        
                                           
                 
              <div class="col-lg-12">
                  
               
                <div class="card">
                 

                    <div class="card-header1">
                                       
                                        
      <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>
  
                                    </div>
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
                    





                        <div class="row" ng-init="fetchData()">
                            
                            
                            
                            
                            
                             
                             
                              <div class="col-md-12" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-2 col-form-label"><b>Customer Name</b> <span style="color:red;">*</span> </label>
                                                         <div class="col-sm-4">
                                                          <select class="form-control"  data-trigger name="choices-single-default"
                                                            id="choices-single-default" ng-init="userList('Customer')" ng-model="get_users">
                                                            
                                                                
                                                             <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->company_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                                 
                                                            </select>
                                                           
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
                                               <div class="col-md-12" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-2 col-form-label"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-4">
                                                            <select <?php if($vvl->required==1) { ?> required <?php } ?> class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
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
                                     else if($vvl->type=='Text Area')
                                     {
                                         
                                         
                                          
                                         
                            ?>
                                                <div class="col-md-12" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-2 col-form-label"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-4">
                                                           
                                                           
                                                           <textarea rows="4" <?php if($vvl->required==1) { ?> required <?php } ?> class="form-control <?php echo strtolower($vvl->label_name); ?>" name="<?php echo strtolower($vvl->label_name); ?>" ng-model="<?php echo strtolower($vvl->label_name); ?>"></textarea>
                                                           
                                                           
                                                           
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
                                         
                                           <div class="col-md-12" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-2 col-form-label"><b><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></b> <?php if($vvl->required==1) { ?><span style="color:red;">*</span> <?php } ?></label>
                                                         <div class="col-sm-4">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" <?php if($vvl->required==1) { ?> required <?php } ?> class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      </div>



                    
                        
                        
                        

                    <table  class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatasub()">
                      <thead>
                        <tr>


                          <th>Accounts Heads</th>
                          <th>Description</th>
                          <th>Debits </th>
                          <th>Credits</th>
                          <th>Action</th>
                         
            
                        </tr>
                      </thead>
                      <tbody id="show_details">
                        <tr ng-repeat="name in namesDatasub">
                          
                          
                            <td>
                                
                                                            <select  class="form-control accountshead"  name="accountshead"  >
                                     
                                                             <option value="{{name.accountshead}}">{{name.accountshead}}</option>
                                                              <?php
                                                              foreach ($accountheads as $val)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                
                                
                            </td>
                            <td><input types="text" class="form-control description" value="{{name.description}}" name="description"></td>
                            <td><input types="text" class="form-control debits" name="debits" value="{{name.debits}}"></td>
                            <td><input types="text" class="form-control credits" name="credits" value="{{name.credits}}"></td>
                            <td>
                              <button type="button"  class="btn btn-outline-danger" onclick="return add_row();"><i class="mdi mdi-plus menu-icon"></i></button>
                            </td>
                          
                        </tr>
                       
                      
                      </tbody>
                    </table>
                 <div class="row">
                     
                
                 
                            <div class="col-md-6">
                                </div>                    
                          <div class="col-md-6">
                        <table class="table align-middle mb-0 table-nowrap" style="line-height: 40px;">
                                                                   
                                                                    <tbody>
                                                                   
                                                                        
                                                                         <tr>
                                                                        <td>
                                                                            <h6 class="m-0">Total:</h6>
                                                                        </td>
                                                                        <td>
                                                                             <b id="d_tot">0.00</b>
                                                                        </td>
                                                                        <td>
                                                                             <b id="c_tot">0.00</b>
                                                                        </td>
                                                                        </tr>
                                                                        
                                                                      
                                                                        
                                                                        
                                                                    </tbody>
                                                                </table>
                         </div>
                       
                       </div>  
                        
                      

                    
                        
                         <div class="col-md-12">
                             <br><br>
                          <div class="form-group text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
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
                                  <option value="Text Area">Text Area</option>
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
                            <label class="col-sm-5 col-form-label">Required</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control" required  ng-model="required">
                                  
                                  <option value="1"> Required</option> 
                                  <option value="0">Not Required</option> 
                                  
                              </select>

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
                                      if($val->id==6)
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












<script>




var count_value_dyeing = 1;
function add_row()
{

      var all =count_value_dyeing++;
      
       var data='<tr class="showdata"><td> <select class="form-control accountshead" name="accountshead" > <option value="">Select Account</option> <?php foreach ($accountheads as $val) { ?> <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option> <?php } ?> </select> </td> <td><input types="text" class="form-control description" name="description"></td> <td><input types="text" class="form-control debits" name="debits"></td> <td><input types="text" class="form-control credits" name="credits"></td> <td> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove();"><i class="fa fa-minus"></i></button> </td> </tr>';
     
      $('#show_details').append(data);
      
       $(".debits").on('input',function(){
    
                                                                                      var debitssum = 0
                                                                                      $('.debits').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var debits = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var debits = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               debitssum += parseFloat(debits);
                                                                                             
                                                                                      });
                                                                                      
                                                                                      $("#d_tot").text(debitssum);
                                                                                      
                                                                                      
                                                                                      
                                                                                          var d_tot= parseFloat($('#d_tot').text());
                                                                                          var c_tot= parseFloat($('#c_tot').text());
                                                                                          var lasttot= d_tot-c_tot;
                                                                                         
    
    
  });
  
   $(".credits").on('input',function(){
    
                                                                                      var creditssum = 0
                                                                                      $('.credits').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var credits = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var credits = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               creditssum += parseFloat(credits);
                                                                                             
                                                                                      });
                                                                                      
                                                                                      $("#c_tot").text(creditssum);
                                                                                      
                                                                                      
                                                                                      
                                                                                          var d_tot= parseFloat($('#d_tot').text());
                                                                                          var c_tot= parseFloat($('#c_tot').text());
                                                                                          var lasttot= c_tot-d_tot;
                                                                                         
    
    
  });
  
      
     
      
}
function remove()
{

      $('#show_details .showdata:last').remove();
                 
}


$(document).ready(function(){
    
    
    
    
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
    
    
    
    
    
    
   $(".debits").on('input',function(){
       
       
    
                                                                                      var debitssum = 0
                                                                                      $('.debits').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var debits = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var debits = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               debitssum += parseFloat(debits);
                                                                                             
                                                                                      });
                                                                                      
                                                                                      $("#d_tot").text(debitssum);
                                                                                      
                                                                                      
                                                                                      var d_tot= parseFloat($('#d_tot').text());
                                                                                      var c_tot= parseFloat($('#c_tot').text());
                                                                                      var lasttot= d_tot-c_tot;
                                                                                     
    
    
  });
  
   $(".credits").on('input',function(){
    
                                                                                      var creditssum = 0
                                                                                      $('.credits').each(function () {
                                                                                             
                                                                                                    
                                                                                                if($(this).val()=='')
                                                                                                {
                                                                                                    var credits = 0;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                     var credits = $(this).val();
                                                                                                }
                                                                                                    
                                                                                               creditssum += parseFloat(credits);
                                                                                             
                                                                                      });
                                                                                      
                                                                                      $("#c_tot").text(creditssum);
                                                                                      
                                                                                      
                                                                                      
                                                                                      var d_tot= parseFloat($('#d_tot').text());
                                                                                      var c_tot= parseFloat($('#c_tot').text());
                                                                                      var lasttot= c_tot-d_tot;
                                                                                       
                                                                                    
    
    
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
    
    
    
    
    
     $scope.type = 0;
   

  $scope.success = false;
  $scope.error = false;



   $scope.submit_button = 'Update';
   $scope.input_label=0;



$scope.grouping=6;
$scope.required=1;


$scope.submitFormmaster = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'type':$scope.typebase,'option':$scope.option,'grouping':$scope.grouping,'required':$scope.required,'id':1,'action':'Add','tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
       
       
         alert('Created..');
         location.reload();
        
      }



    });
  };

  
   
     
      $scope.userList = function (party_type) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'party_type':party_type}
          }).success(function(data){
    
             $scope.usderlistdata = data;
         
          });
          
      
}
 
  $scope.submitForm = function(){
      
      
      
      
      
      
      var debits = $(".debits");
      var debits_value = [];
      for(var i = 0; i < debits.length; i++){
          
           debits_value.push($(debits[i]).val());
         
      }
      var debits_value_data= debits_value.join("|");
      
      
      
      
      var credits = $(".credits");
      var credits_value = [];
      for(var i = 0; i < credits.length; i++){
          
           credits_value.push($(credits[i]).val());
         
      }
      var credits_value_data= credits_value.join("|");
      
      
      
      
      
      var description = $(".description");
      var description_value = [];
      for(var i = 0; i < description.length; i++){
          
           description_value.push($(description[i]).val());
         
      }
      var description_value_data= description_value.join("|");
      
      
      
      
      var accountshead = $(".accountshead");
      var accountshead_value = [];
      for(var i = 0; i < accountshead.length; i++){
          
           accountshead_value.push($(accountshead[i]).val());
         
      }
      var accountshead_value_data= accountshead_value.join("|");
      
       var get_users=$('#choices-single-default').val();
      
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/payment_received/insertandupdate",
      data:{
          'debits_value_data':debits_value_data,
          'credits_value_data':credits_value_data,
          'description_value_data':description_value_data,
          'accountshead_value_data':accountshead_value_data,
          <?php
          foreach($additional_information as $vl)
          {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
          }
          ?>
          'id':'<?php echo $id; ?>','action':$scope.submit_button,'get_users':get_users,'tablename':'payment_received'}
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
                                                                $scope.error = false;
                                                               
                                                                $scope.successMessage = data.massage;
                                    
                                    
                                    
                        
                                  }
    
              
    
          }

       
    });
  };
  
  
  
  $scope.fetchData = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/payment_received/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'payment_received'}
    }).success(function(data){

        
        
                                  $scope.hidden_id = data.id;
                                 
                                 
                                  $scope.get_users = data.get_users;
                                  
                                 
                                  
        
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                                  <?php
                                 }
                                 ?>
        
        
                                
         


     
    });
};


  
    
      $scope.fetchDatasub = function(){
        $http.get('<?php echo base_url() ?>index.php/payment_received/fetch_data_sub?id=<?php echo $id; ?>').success(function(data){
          
          $scope.namesDatasub = data;
          
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debits = parseInt(data[i].debits);
                    amounttotaldebits += debits;
                }
                
                
               $("#d_tot").text(amounttotaldebits);
               
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credits = parseInt(data[i].credits);
                  
                    amounttotalcredits += credits;
                }
                
                
               $("#c_tot").text(amounttotalcredits);
               $("#difference").text(amounttotaldebits-amounttotalcredits);
          
          
        });
      };



});

</script>
    <?php include ('footer.php'); ?>
</body>


