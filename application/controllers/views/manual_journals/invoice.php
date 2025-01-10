<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">

h6.mb-sm-0.font-size-12.ng-binding {
    line-height: 20px;
}


.invoice-6 .table td, .invoice-6 .table th {
    font-size: 12px;
    padding: 7px 5px !important;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
    border-right: 1px solid #e9ecef;
    text-align: left;
}
td.text-right.bold {
    text-align: right !important;
    font-size: 14px;
    font-weight: 700;
}
img.logo {
    width: 180px;
}
.full-vh-overflow-hide {
  
    background: #fff;
}
div#invoice_wrapper {
    border: #ededed solid 2px;
    padding: 31px;
    margin: 10px 0px;
}
@media print
{    
   
    .no-print
    {
        display: none !important;
    }
    div#invoice_wrapper {
    border: #fff solid 2px;
    padding: 0px;
    margin: 0px 0px;
}
    
    
}
</style>
<link href="<?php echo base_url(); ?>assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />


<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">





<div  id="htmlContent">
    <div class="container">
        <a href="javascript:window.print()" style="float: right;color: white;margin: 18px 0px;"class="btn btn-sm btn-download no-print">
                        <i class="fa fa-download"></i> Print
                    </a>
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
                                    4/333/7, N.H., BYE PASS ROAD, KAIKATTI PUDHUR, AVINASHI – 641654, </br>TIRUPUR, TAMILNADU</br>
                                   
                                    www.Zaron.in | Email: sales@zaron.in</br>
                                    <small>(MANUFACTURERS OF ROOFING SHEETS & C Z PURLINS)</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="invoice-info" ng-init="fetchData()">
                        <div class="row">
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number" ng-init="fetchCustomerorderdata()">
                                    <h4 class="inv-title-1"><b>To :</b> </h4>
                                  
                                </div>
                            </div>
                            <div class="col-sm-6 mb-30">
                                <div class="invoice-number text-end">
                                    
                                    
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <p class="invo-addr-1" style="text-transform: uppercase;"><b> Name </b></p>
                                            </td>
                                            <td>
                                                <p class="invo-addr-1" style="text-transform: uppercase;"><b>{{partyname }} </b></p>
                                            </td>
                                        </tr>
                                        
                                         <?php
                                      foreach($additional_information as $vvl)
                                      {
                                       ?>
                                      
                                        <tr ng-if="<?php echo strtolower($vvl->label_name); ?>">
                                            <td>
                                                <p class="invo-addr-1 <?php echo strtolower($vvl->label_name); ?> set_<?php echo strtolower($vvl->label_name); ?>" > <?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?> </p>
                                            </td>
                                            <td>
                                                <p class="invo-addr-1" >{{<?php echo strtolower($vvl->label_name); ?>}}</p>
                                            </td>
                                        </tr>
                                       <?php
                                      }
                            
                                     
                                     ?>
                                     
                                       
                                        
                                    </table>
                                    
                                     <!--<p class="invo-addr-1">User type :  {{party_type}}</p>-->
                                     
                                    
                                     
                                     
                                        
                                        
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>


                    <div class="order-summary">
                          
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                           <div class="navclass">
                               
                                
                                
                                
                              
                                 
                                 <div  data-pattern="priority-columns" >
                                      <table  class="table table-bordered dt-responsive  nowrap w-100"  ng-init="fetchDatasub()">
                      <thead>
                        <tr>


                         
                          <th align="left" style="text-align:left;"><b>Description</b></th>
                        <th><b>Payment</b></th>
                          <th><b>Receipt</b></th>
                        
            
                        </tr>
                      </thead>
                      <tbody id="show_details">
                        <tr ng-repeat="name in namesDatasub">
                          
                          
                           
                            <td align="left">{{name.description}}</td>
                            <td>{{name.debits | number}}</td>
                            <td>{{name.credits | number}}</td>
                            
                          
                        </tr>
                        
                        
                                                                        <tr>                                    
                                                                        <td >
                                                                            <h6 class="m-0">Total:</h6>
                                                                        </td>
                                                                        <td>
                                                                             <b id="d_tot">{{amounttotaldebits | number}}</b>
                                                                        </td>
                                                                        <td>
                                                                             <b id="c_tot">{{amounttotalcredits | number}}</b>
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





<script>


  $('.journal_date').html('Transaction Date');
      $('.journal_id').html('Transaction ID');
      $('.notes').html('Narration');

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
        if (! isNaN(input)) {
            var currencySymbol = '₹';
            //var output = Number(input).toLocaleString('en-IN');   <-- This method is not working fine in all browsers!           
            var result = input.toString().split('.');

            var lastThree = result[0].substring(result[0].length - 3);
            var otherNumbers = result[0].substring(0, result[0].length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var output = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            
            if (result.length > 1) {
                output += "." + result[1];
            }            

            return currencySymbol + output;
        }
    }
});



app.controller('crudController', function($scope, $http){
    
    
    
    
    
     $scope.type = 0;
   

  $scope.success = false;
  $scope.error = false;



   $scope.submit_button = 'Update';
   $scope.input_label=0;



$scope.grouping=4;
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

  
 $scope.getUser = function(){
     var party_type= $scope.party_type;
     
   $scope.userList(party_type);
     
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
      
      
      
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/manual_journals/insertandupdate",
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
          'id':'<?php echo $id; ?>','action':$scope.submit_button,'party_type':$scope.party_type,'get_users':$scope.get_users,'tablename':'manual_journals'}
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
      url:"<?php echo base_url() ?>index.php/manual_journals/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'manual_journals'}
    }).success(function(data){

        
        
                                  $scope.hidden_id = data.id;
                                  $scope.party_type = data.party_type;
                                 
                                  $scope.userList(data.party_type);
                                  
                                  
                                  
                                 
                                  
        
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                                  <?php
                                 }
                                 ?>
        
        
                                $scope.get_users = data.get_users;
                                 $scope.partyname = data.partyname;
         


     
    });
};


  
    
      $scope.fetchDatasub = function(){
        $http.get('<?php echo base_url() ?>index.php/manual_journals/fetch_data_sub?id=<?php echo $id; ?>').success(function(data){
          
          $scope.namesDatasub = data;
          
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debits = parseInt(data[i].debits);
                    amounttotaldebits += debits;
                }
                
                
                $scope.amounttotaldebits=amounttotaldebits;
               
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credits = parseInt(data[i].credits);
                  
                    amounttotalcredits += credits;
                }
                
                $scope.amounttotalcredits=amounttotalcredits;
          
          
        });
      };



});

</script>
    <?php include ('footer.php'); ?>
</body>


