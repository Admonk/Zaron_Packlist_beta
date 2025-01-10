<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.trpoint:hover {
    background: antiquewhite;
}
.card-header {
    display: block;
    text-align: center;
}
.loading {
    text-align: center;
}

::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}
.table-responsive {
    height: 500px;
    cursor: grab;
}

tr td {
    font-size: 11px;
}
.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
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
                                   
                                     <h4 class="mb-sm-0 font-size-18"> DAY BOOK</h4>
                                    
                                   

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">DAY BOOK!</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                  
                  <div class="card-body" >


                <div class="row">
                   
                    
                    <div class="col-lg-12" >
                        <p class="mb-sm-0 font-size-18">Search</p>  
                      <form>
                          <div class="row">
                            
                            <div class="col">
                                  <lable>From date</lable>
                              <input type="date" class="form-control" min="<?php echo date('2023-10-01'); ?>" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                                <lable>To date</lable>
                              <input type="date" class="form-control" min="<?php echo date('2023-10-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                            <div class="col">
                             <lable> Type</lable>
                             
                             
                             
                             <select class="form-control" id="party_type">
                                 <option value="All">All</option>
                                  <?php 
                                 
                                 foreach($partytype as $val)
                                 {
                                     
                                     
                                         
                                     if($val->id!=4)
                                     {


                                     ?>
                                       <option value="<?php echo  $val->id; ?>"><?php echo  $val->name; ?></option>
                                 
                                     <?php

                                     }
                                     
                                    
                                 }
                                 
                                 ?>
                             </select>
                             
                             
                            </div>

                            <?php 
                                         $sst="d-none";
                                       if($accounthead_check=='1')
                                       {
                                          $sst="";
                                       }
                            ?>

                              <div class="col <?php echo $sst; ?>">
                             <lable> Account Head</lable>
                             
                             
                             
                             <select class="form-control" id="accountheads_sub_group">
                                 <option value="All">All</option>
                                  <?php 
                                  
                                 foreach($accountheads_sub_group as $vals)
                                 {
                                     
                                     
                                         
                                   

                                     ?>
                                       <option value="<?php echo  $vals->id; ?>"><?php echo  $vals->name; ?></option>
                                 
                                     <?php

                                   
                                     
                                    
                                 }
                                 
                                 ?>
                             </select>
                             
                             
                            </div>




                             <div class="col" style="margin: 20px 0px;">
                                 
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata1" ng-click="exportToExcel()" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     <?php
                     $customer_id=0;
                     
                     
                     ?>
                     
                     

                            <div class="row" >
                         
                          <div class="col-xl-3 col-md-3" ng-if="opening_balance>0">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Opening Balance</h5>
                                                <h6 class="mb-3">
                                                    <span>{{ opening_balance | number}}</span>
                                                </h6>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->

                            <div class="col-xl-3 col-md-3" ng-if="totaldebit>0">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Total Debit</h5>
                                                <h6 class="mb-3">
                                                     <span >{{totaldebit | number}}</span>
                                                </h6>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                             <div class="col-xl-3 col-md-3" ng-if="totalcridit>0">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Total Credit </h5>
                                                <h6 class="mb-3">
                                                     <span  >{{totalcridit | number}}</span>
                                                </h6>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                            
                            
        
                              <div class="col-xl-3 col-md-3" ng-if="closing_balance > 0">
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Closing Balance </h5>
                                                <h6 class="mb-3">
                                                     <span >{{ closing_balance | number}}</span>
                                                </h6>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
        
                           
                        </div>
                     
                   
                           
                  <div id="search-view" >
                      
                      <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                  
                  <!-- ng-init="fetchDatagetlegderGroupcloseingbalance('<?php echo $customer_id; ?>','<?php echo date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>','All','All')" -->
                     <div class="table-responsive">
                      <!-- ng-init="fetchDatagetlegderGroup('<?php echo $customer_id; ?>','<?php echo date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>','All','All')" -->
                   <table id="datatable" class="table table-striped table-bordered"  width="100%">
                      <thead>
                        <tr>
                            
                           <th style="width:70px;">No</th>
                          <th>Date</th>
                          <th style="width:200px;">Party name</th>
                          
                          <th style="width:200px;">Remarks </th>
                          <th style="width:200px;">Voucher Type</th>
                          <th style="width:200px;">Account head</th>
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                          <th>User</th>
                        
                          
            
                        </tr>
                      </thead>




                       <tr style="font-weight:800;" ng-if="names.payment_date!=4">
                        <td >#</td>
                        <td>{{opening_date}}</td>
                        <td>Opening Cash Balance</td>
                        <td style="font-weight:800;text-align: right;"> <loading></loading> </td>
                        <td></td>
                        <td></td>
                        <td style="font-weight:800;text-align: right;"> <span ng-if="opening_status==0">{{ opening_balance | number }}</span></td>
                        <td style="font-weight:800;text-align: right;"><span ng-if="opening_status==1">{{ opening_balance | number}}</span></td>
                        <td></td>
                       </tr>
                         <tbody  ng-repeat="names in namesDataledgergroup | filter:query">
                            
                            
                        <tr  class="trpoint"  >
                        
                           <td>{{$index+1}}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/{{names.link}}" target="_blank">{{names.payment_date}}</a></td>
                           <td>
                            <a href="<?php echo base_url(); ?>index.php/{{names.link}}" target="_blank">{{names.party_name}}</a>

                           </td>
                          
                           <td>
                              <span ng-if="names.notes">{{names.notes}}<br></span>
                               <!-- <span >{{names.subarray.notes}}<br></span> -->
                              <span ng-if="names.reference_no"> & {{names.reference_no}}</span>
                            </td>

<td>{{names.voucher_base}}</td>
                            <td>
                              <span ng-if="names.payment_mode"> {{names.payment_mode}}</span>
                            </td>
                           
                           <td style="font-weight:800;text-align: right;"><span ng-if="names.debits!=0">{{names.debits | number}}</span></td>
                           <td style="font-weight:800;text-align: right;"><span ng-if="names.credits!=0">{{names.credits | number}}</span></td>
                           <td>{{names.process_by}}</td>
                          
                        </tr>

                        <tr  ng-repeat="val in names.subarray" >
                        
                           <td ></td>
                           <td></td>
                           <td>
                            <a href="<?php echo base_url(); ?>index.php/{{val.link}}" target="_blank">{{val.party_name}}</a>
                            <br>
                            <a href="<?php echo base_url(); ?>index.php/{{val.link}}" target="_blank">{{val.payment_mode}}</a>
                           
                           
                         </td>
                          
                           <td> </td>
                            <td></td>
                            <td></td>
                           <td style="font-weight:800;text-align: right;"><span ng-if="val.debits!=0">{{val.debits | number}}</span></td>
                           <td style="font-weight:800;text-align: right;"><span ng-if="val.credits!=0">{{val.credits | number}}</span></td>
                           <td></td>
                          
                        </tr>
                        
                      
                      </tbody>

                      <tr>


                         <th style="width:70px;"></th>
                          <th ></th>
                          <th style="width:200px;"></th>
                          
                          <th style="width:200px;">TOTAL</th>
                           <td></td>
                           <td></td>
                          <th style="font-weight:800;text-align: right;">{{ totaldebit | number}}</th>
                          <th style="font-weight:800;text-align: right;">{{ totalcridit | number}}</th>
                          <th></th>
                        

                      </tr>

                     
                      <tr style="font-weight:800;">
                        <td>#</td>
                        <td>{{closing_date}}</td>
                        <td>Closing Balance</td>
                        <td style="font-weight:800;text-align: right;"> </td>
                        <td></td>
                        <td></td>
                        <td style="font-weight:800;text-align: right;"> <span ng-if="closing_status==0">{{ closing_balance | number}}</span></td>
                        <td style="font-weight:800;text-align: right;"><span ng-if="closing_status==1">{{ closing_balance | number}}</span></td>
                        <td></td>
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
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Cash To Bank Payment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                               
                                                               
                                                               
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Bank Account <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                    
                                                                    
                                                                    
                                                                      <select class="form-control" data-trigger name="party1"
                                                            id="party1"
                                                            placeholder="This is a search"  ng-change="Getbankaccount1()" ng-model="getbank1">
                                                            <option value="">Search Bank</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($bankaccount as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->bank_name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                                                        </select>
                                                                    
                                                           
                                                                  <span ng-if="opening_balance1"><b>Available Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                             
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes_r" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Date <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" value="<?php echo date('Y-m-d'); ?>" id="create_date" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="transfer()">Payment Transfer</button>
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
  $("#exportdatadata").hide();
  
  
  
  $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
   
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
          $('#bankaccountshow').hide();
      }
      else
      {
          $('#res_no').show();
          $('#bankaccountshow').show();
      }
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status=1;  
    var party_type= $('#party_type').val();
    
     var id='<?php echo $customer_id; ?>';
  
    url = '<?php echo base_url() ?>index.php/report/day_book_export?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);


app.directive('loading', function () {
      return {
        restrict: 'E',
        replace:true,
        template: '<div class="loading"><img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" width="20" height="20" /> LOADING...</div>',
        link: function (scope, element, attr) {
              scope.$watch('loading', function (val) {
                  if (val)
                      $(element).show();
                  else
                      $(element).hide();
              });
        }
      }
})




app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = '';
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

  $scope.success = false;
  $scope.error = false;


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

          $scope.name = data.company_name;
          $scope.phone = data.phone;
          $scope.email = data.email;
          $scope.gst = data.gst;
          
          $scope.fulladdress = data.fulladdress;
        
         
     
    });
};



$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status='<?php echo $_GET['type']; ?>';  
     var party_type= $('#party_type').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     // $scope.fetchSingleData(userid);
   
     // $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
     $scope.fetchDatagetlegderGroupcloseingbalance(userid,fromdate,fromto,payment_status,party_type);
  
  
    
    
};



 $scope.transfer = function () {
           
           
           
             var selectcollection_id_data=0;
      var selectcollection = $(".check");
      var selectcollection_id_value = [];
      var selectcollection_id_value_table = [];
      for(var i = 0; i < selectcollection.length; i++){
          
          if($(selectcollection[i]).is(':checked')) {
              
           selectcollection_id_value.push($(selectcollection[i]).val());
           selectcollection_id_value_table.push($(selectcollection[i]).data('table'));
           
          }
         
      }
      var selectcollection_id_data= selectcollection_id_value.join("|");
      var selectcollection_id_data_table= selectcollection_id_value_table.join("|");
      
      if(selectcollection_id_data!="")
      {
         
         var bankaccount=$("#party1").val();
         var notes=$("#notes_r").val();
         var create_date=new Date($("#create_date").val());
         
         if(bankaccount!="")
         {
             
             
              $scope.saveTransfer(bankaccount,notes,selectcollection_id_data,selectcollection_id_data_table,create_date);
             
         }
         else
         {
             alert('Please Select Bankaccount');
         }
         
         
      }
      else
      {
           alert('Please Select Checkbox');
      }
    
    
   


};

     



$scope.saveTransfer = function(bankaccount,notes,selectcollection_id_data,selectcollection_id_data_table,create_date){

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/save_to_pay_transfer_bank",
                        data:{'notes':notes,'bankaccount':bankaccount,'selectcollection_id_data':selectcollection_id_data,'selectcollection_id_data_table':selectcollection_id_data_table,'create_date':create_date}
                        }).success(function(data){
                          
                             $('#firstmodalcommisonparty').modal('toggle');
                             $scope.search();
                             
                             
                        });

};










$scope.onview = function(id,billno,pendingamount,resno){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
     
     $('#reference_no').val(resno);
     
    
  
    
};



 $scope.exportToExcel = function () {


                    

                var date=    $('#from-date').val();


                $("#datatable").table2excel({
                    filename: "DAY-BOOK_"+date+".xls"
                });
 };



  $scope.Getbankaccount1 = function () {
      
      
      
      
      
           $http({
          method:"POST",
          url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
          data:{'id':$scope.getbank1, 'action':'fetch_single_data','tablename':'bankaccount'}
        }).success(function(data){
            
            
             $scope.opening_balance1 = data.current_amount;
             
            
         
        });
      
      
      
};   


  $scope.fetchDatagetlegderGroupcloseingbalance = function(id,fromdate,fromto,payment_status,party_type){
    
    var payment_status=1;  
    
    var id='<?php echo $customer_id; ?>';
var accountheads_sub_group=$('#accountheads_sub_group').val();


    
    $http.get('<?php echo base_url() ?>index.php/report/day_book_all_view_balance?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status+'&accountheads_sub_group='+accountheads_sub_group).success(function(data){
      
     
         var userid= $('#choices-single-default').val();
        var fromdate= $('#from-date').val();
        var fromto= $('#to-date').val();
        var payment_status='<?php echo $_GET['type']; ?>';  
        var party_type= $('#party_type').val();

      
       // console.log($scope.totalcridit)

       

        $scope.opening_balance =  parseFloat(data.opening_balance).toFixed(2);
        $scope.opening_balanceval = parseInt(data.opening_balance);

        $scope.opening_status = data.opening_status;
        $scope.closing_status = data.closing_status;

        $scope.opening_date =data.opening_date;

        $scope.closing_date = data.closing_date;
      
    
   

   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);

      
      
    });
  };


$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status,party_type){
    


 $scope.loading = true;
     
    var payment_status=1;  
    
    var id='<?php echo $customer_id; ?>';
    var accountheads_sub_group=$('#accountheads_sub_group').val();
    
    $http.get('<?php echo base_url() ?>index.php/report/day_book_all_view_beta?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status+'&accountheads_sub_group='+accountheads_sub_group).success(function(data){
      
      // console.log(data)
     var total_credits_bank=0;
     var total_debits_bank=0;
     var total_credits=0;
     var total_debits =0;
      angular.forEach(data, function(value, key) {

       if(value.credits >0){
        // console.log(parseInt(value.credits));
          total_credits += parseFloat(value.credits);
          }
          if(value.debits >0){
            total_debits += parseFloat(value.debits);
          }
        var subarray = value.subarray; 
        angular.forEach(subarray, function(value1, key) {
          total_credits_bank += parseFloat(value1.credits);
          total_debits_bank += parseFloat(value1.debits);
        })
      })

      
      // console.log(total_debits);
       $scope.loading = false;
      $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
    
      $scope.totalcridit =parseFloat(total_credits + total_credits_bank).toFixed(2);
      $scope.totaldebit = parseFloat(total_debits + total_debits_bank).toFixed(2);


     if($scope.opening_status == 1){
      $scope.totalcridit = parseFloat(total_credits + total_credits_bank + $scope.opening_balanceval).toFixed(2);
     }else{
      $scope.totaldebit = parseFloat(total_debits + total_debits_bank + $scope.opening_balanceval).toFixed(2);
     }


        $scope.closing_balance = Math.abs($scope.totalcridit - $scope.totaldebit).toFixed(2);

        // console.log($scope.closing_balance)
      
       $scope.totalmines = data.totalmines;
        $scope.st2 = data.st1;
      
     
      
      $scope.totaldebits_cash = data.totaldebits_cash;
      $scope.totalcredits_cash = data.totalcredits_cash;
      $scope.total_value_cash = data.total_value_cash;
      $scope.cash_get = data.cash_get;
      
      
      
    });
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   

  
  
  
  
  
  $scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

  
  
  
  
  
  
  

});

</script>
           <script src="<?php echo base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?php echo base_url(); ?>assets/libs/pace-js/pace.min.js"></script>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
       
                 <script src="<?php echo base_url(); ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

         <script src="<?php echo base_url(); ?>assets/libs/pristinejs/pristine.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-validation.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script src="<?php echo base_url(); ?>assets/table2excel.js"></script>
    
 </html>



</body>


