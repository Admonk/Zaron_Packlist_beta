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


::-webkit-scrollbar {
    height: 10px !important;
    width: 10px !important;
    cursor: pointer;
}
.table-responsive {
    height: 500px;
    cursor: grab;
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
                                <div class="page-title-box d-sm-flex align-items-center mt-3 justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> Ledger Report  </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Ledger Report !</li>
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
                     
                      <form>
                          <div class="row">
                            
                            <div class="col">
                                  <lable>From date</lable>
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col">
                                <lable>To date</lable>
                              <input type="date" class="form-control" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                            <div class="col">
                             <lable>Type</lable>
                             
                             
                             
                             <select class="form-control" id="party_type">
                                 <option value="All">All</option>
                                
                                
                                 <?php 
                                 
                                 foreach($partytype as $val)
                                 {
                                     ?>
                                       <option value="<?php echo  $val->id; ?>"><?php echo  $val->name; ?></option>
                                 
                                     <?php
                                 }
                                 
                                 ?>
                               
                                 
                             </select>
                             
                             
                            </div>
                             <div class="col" style="margin: 20px 0px;">
                                 
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     <br><br>
                     
                     
                     <?php
                     $accountshead=0;
                     if(isset($_GET['accountshead']))
                     {
                         $accountshead=$_GET['accountshead'];
                     }
                     
                     ?>
                     
                     
                     <div class="row" >
                         
                          
                            
                           
                           
                             <div class="col-xl-4 col-md-4" >
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Debit </h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totaldebit | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
        
                             <div class="col-xl-4 col-md-4" >
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Credit </h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totalcridit | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                            
                             <div class="col-xl-4 col-md-4" >
                                <!-- card -->
                                <div class="card card-h-50">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total Balance</h3>
                                                <h4 class="mb-3">
                                                    Rs.  <span >{{totalcridit-totaldebit | number}}</span>
                                                </h4>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                            
                            
                            
                       
        
                           
                        </div>
                     
                     
                       
                           
                  <div id="search-view" >
                      
                      <h3 style="text-align: center;"><?php echo $data_title; ?></h3>
                      
                      <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                  
                     <div class="table-responsive">
                   <table id="datatable" class="table table-striped table-bordered"  width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $accountshead; ?>','<?php echo date('Y-m-d'); ?>','<?php echo date('Y-m-d'); ?>','All','All')" >
                      <thead>
                        <tr>

                         <th>No</th>
                          <th>Date</th>
                          <th>Name </th>
                          <th>Reference No </th>
                          <th>Particulars</th>
                         
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                          <th style="font-weight:800;text-align: right;">Balance</th>
                          <th>Payment Mode</th>
                          
                          
                          
                          <!--<th>Accounts Head </th>-->
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint" >
                         
                           <td>{{names.no}}</td>
                           <td>{{names.payment_date}}</td>
                           <td><a href="<?php echo base_url(); ?>index.php/{{names.link}}" target="_blank">{{names.party_name}}</a></td>
                           <td>{{names.reference_no}}</td>
                          <td>{{names.process_by}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.debits | number}}</td>
                           <td style="font-weight:800;text-align: right;">{{names.credits | number}}</td>
                           <td style="font-weight:800;text-align: right;">
                                 <span  ng-if="names.balance<0" style="color:red">{{names.balance | number}}</span>
                                   <span  ng-if="names.balance>=0" style="color:green">{{names.balance | number}}</span>
                           </td>
                           
                           <td>
                               
                               <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   {{names.payment_mode}}
                                   <br>
                                   {{names.bank_name}}
                                   </span>
                               
                               
                               
                               </td>
                         
                           
                           
                            <!--<td>{{names.accounthead}}</td>-->
                            
                        </tr>
                        
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr style="display:none;">
                                                                
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                 <td></td>
                                                                  <td  style="font-weight:800;text-align: right;">{{totaldebit | number}}</td>
                                                                  <td  style="font-weight:800;text-align: right;">{{totalcridit | number}}</td>
                                                                  
                                                                  <td></td>
                                                                  <!--<td></td>-->
                                                                
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
                                                                    
                                                           
                                                                  <span ng-if="opening_balance1"><b>Current Balance : {{opening_balance1}}</b></span>
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
    var payment_status='<?php echo $_GET['type']; ?>';  
    var party_type= $('#party_type').val();
    
     var id='<?php echo $accountshead; ?>';
  
    url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export_all_base_by?limit=10&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status;

 
    location = url;

});


});
</script>
<script>

var app = angular.module('crudApp', ['datatables']);
app.filter('number', function () {        
    return function (input) {
        if (! isNaN(input)) {
            var currencySymbol = 'Rs ';
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
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
    
    
    
    
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



  $scope.Getbankaccount1 = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.getbank1, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.opening_balance1 = data.current_amount;
		         
		        
		     
		    });
      
      
      
};   



$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status,party_type){
    



     
    var payment_status='<?php echo $_GET['type']; ?>';  
    
    
    var id='<?php echo $accountshead; ?>';
    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_all_base_by?limit=10&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data){
      
      
       $scope.query = {}
      $scope.queryBy = '$';
      
      
      $scope.namesDataledgergroup = data;
      
      
      
        var creditstotal = 0;
        for(var i = 0; i < data.length; i++){
            var credits = parseFloat(data[i].credits,2);
            creditstotal += credits;
        }
      
     $scope.totalcridit = creditstotal.toFixed(2);
      
      
      
      
      
         var debitstotal = 0;
        for(var i = 0; i < data.length; i++){
            var debits = parseFloat(data[i].debits,2);
            debitstotal += debits;
        }
      
      
      
     
      
        $scope.totaldebit = debitstotal.toFixed(2);
        
        
        
        
       
      
      
     
      
      
      
      
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
 
    
 </html>



</body>


