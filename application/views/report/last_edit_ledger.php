<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   font-size:10.5px;
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
td a {
    color: black;
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


.table>tbody {
    vertical-align: middle;
}

.bgcolorchange {
    background: #ededed;
}
</style>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>











<?php
                     $accountshead=0;
                     $totaltest1="Debit";
                     $totaltest2="Credit";
                     $totaltest3="";
                      $none="";
                      $formdate=date('Y-m-d');
                      $deleteid=0;
                      $ss="";
                      if(isset($_GET['deleteid']))
                     {
                                   $deleteid=$_GET['deleteid'];
                     }

                     if($deleteid==1)
                     {
                      $ss=" Deleted";
                     }
                     if(isset($_GET['accountshead']))
                     {
                         $accountshead=$_GET['accountshead'];
                         $formdate=date('Y-m-d');
                         
                         if($accountshead=='119')
                         {
                             $totaltest2="Purchase";
                             $totaltest1="Paid";
                             $totaltest3="Payable";
                         }
                         
                         if($accountshead=='116')
                         {
                             $totaltest1="Sales";
                             $totaltest2="Received";
                             $totaltest3="Receivable";
                         }
                         if($accountshead=='126')
                         {
                             $none="d-none";
                             
                         }
                         
                     }
                     
                     ?>




 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center mt-3 justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> 
                                    
                                      <?php
                      if($accountshead!=0)
                      {
                          ?>
                          
                       Trial Balance view  
                          <?php
                          
                      }
                      else
                      {
                          ?>
                          <?php echo $ss; ?> Recent Ledger Transaction 
                          <?php
                      }
                      
                      ?>
                                    
                                    </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Recent Ledger Transaction !</li>
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
                                  
                                  
                              <input type="date" class="form-control" min="<?php echo date('2024-01-01'); ?>" id="from-date" value="<?php echo $formdate; ?>">
                              
                              
                              
                            </div>
                            <div class="col">
                                <lable>To date</lable>
                              <input type="date" class="form-control" min="<?php echo date('2024-01-01'); ?>" id="to-date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                           
                            <div class="col">
                             <lable>Type</lable>
                             
                             
                             
                             <select class="form-control" id="party_type">
                                 <option value="All">All</option>
                                
                                
                                 <?php 
                                 
                                 foreach($partytype as $val)
                                 {
                                     
                                     if($val->id!='4')
                                     {
                                         
                                     
                                     ?>
                                       <option value="<?php echo  $val->id; ?>"><?php echo  $val->name; ?></option>
                                 
                                     <?php
                                     }
                                 }
                                 
                                 ?>
                               
                                 
                             </select>
                             
                             
                            </div>
                             <div class="col" style="margin: 20px 0px;">
                                 
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light <?php echo $none; ?>" id="exportdata" >Export</button>
                            
                            
                                      <?php
                      if($accountshead!=0)
                      {
                          ?>
                          
                       
                             <!-- <a href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger_delete_log?accountshead=<?php echo $accountshead; ?>" target="_blank">Delete Log</a> -->
                            
                          <?php
                          
                      }
                      else
                      {
                          ?>
                          
                             <!-- <a href="<?php echo base_url(); ?>index.php/report/balancereport_base_ledger_delete_log" target="_blank">Delete Log</a> -->
                            
                          <?php
                      }
                      
                      ?>
                            
                             
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     <br><br>
                     
                     
                   
                     
                      
                  <div id="search-view" class="row">
                      
                     
                      <?php
                      if($accountshead!=0)
                      {
                          ?>
                          

                               

                                <div class="col-xl-4 col-md-4" ng-init="fetchDatagetlegderGroup1()">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Opening Balance </h3>
                                              

                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> 
                                                         <span  ng-if="getstatus==1" style="color:red">{{balance | number}}</span>
                                                         <span  ng-if="getstatus==0" style="color:green">{{balance | number}}</span>
                                                </h3>
                                                <!-- <small id="dateview"><?php echo date('d-m-Y',strtotime($formdate)); ?></small> -->
                                               
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        


                                <div class="col-xl-4 col-md-4">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Total <?php echo $totaltest1; ?></h3>
                                                <h4 class="mb-3">
                                                     <span >{{totaldebit | number}}</span>
                                                </h4>
                                               
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-4 col-md-4" ng-init="fetchDatagetlegderGroup2()">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-3 lh-1 d-block text-truncate">Closing Balance </h3>
                                              

                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate"> 
                                                         <span >{{ closing_bl | number }}</span>
                                                         <!-- <span  ng-if="getstatus==0" style="color:green">{{totaldebit -balance | number}}</span> -->
                                                </h3>
                                                <!-- <small id="dateview"><?php echo date('d-m-Y',strtotime($formdate)); ?></small> -->
                                               
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                            
 
                          <?php
                      }
                      
                      ?>
                      
                      
                      
                      <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                  
                     <div class="table-responsive">
                   <table id="datatable" class="table table-striped table-bordered" style="position: relative;"  width="100%" ng-init="fetchDatagetlegderGroup('<?php echo $accountshead; ?>','<?php echo $formdate; ?>','<?php echo date('Y-m-d'); ?>','All','All')" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">

                         <th style="width:50px;">No</th>
                          <th style="width:100px;">Date</th>
                          <th style="width:200px;">Name </th>
                          <th style="width:200px;">Reference_No </th>
                          <th style="width:200px;">Particulars</th>
                         
                              

                          
                          
                           <th style="width:100px;"> Debit</th>
                          <th style="width:100px;">Credit</th>
                         




                         
                          


                         
                          <th style="width:200px;"> Mode</th>
                          
                          
                          
                          <th style="width:200px;">Accounts Head </th>
                          <th style="width:200px;">Narration </th>
                          <!-- <th style="width:100px;">#</th> -->
            
                        </tr>
                      </thead>
                      
                      <tr class="setload" ><td colspan="12"><loading></loading></td></tr>

                        <tbody  ng-repeat="names in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint {{names.addclass}}" >
                         
                           <td>{{names.no}}</td>
                           <td>{{names.payment_date}}</td>
                           <td>
                               
                               
                                <!--<span ng-if="names.invoice_link!=0"><a href="{{names.invoice_link}}" target="_blank"  >{{names.party_name}}</a></span>-->
                                <span ><a href="<?php echo base_url(); ?>index.php/{{names.link}}"  >{{names.party_name}}</a></span>
                           
                               
                               
                               </td>
                           <td>{{names.reference_no}}</td>
                          <td>{{names.process_by}}</td>


                            <?php
                          if($accountshead==116)
                          {
                          ?>

                           <td >{{names.credits | number}}</td>
                        
                           <td >{{names.debits | number}}</td>
                          
                          


                          <?php   
                          }
                          else
                          {
                            ?>

                             <td >{{names.debits | number}}</td>
                           <td >{{names.credits | number}}</td>
                        

                            <?php
                          }
                          ?>

                          
                           
                           <td>
                               
                               <span  ng-if="names.payment_mode=='Cash'">{{names.payment_mode}}</span>
                               
                                  <span  ng-if="names.payment_mode!='Cash'">
                                   <span ng-if="names.payment_mode!='0'"> <small>{{names.payment_mode}}</small></span>
                                  
                                  {{names.bank_name}}
                                   </span>
                               
                                
                               
                               </td>
                         
                           
                           
                          <td>
                              
                                <?php 
                                if($accountshead=='116')
                                {
                                    echo "SALES ACCOUNT";
                                }
                                else
                                {
                                    ?>
                                            {{names.accounthead}}

                                <?php
                                }
                                ?>
                         </td>
                           <td>{{names.notes}}
                           
                             <samll ng-if="names.org_amount!=0"><br>Changed By  : {{names.username}} {{names.org_amount}}</samll>
                           </td>
                         <!-- <td style="display:flex;">
                          
                          <span ng-if="names.invoice_link!=0"><a href="{{names.invoice_link}}" target="_blank"  class="btn btn-outline-success"><i class="mdi mdi-file menu-icon"></i></a></span>
                           
                           
                            <button type="button" ng-click="editData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-pencil menu-icon"></i></button>
                           <button type="button" ng-click="deleteData(names.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete menu-icon"></i></button></td>
                           
                          </td>-->
                            
                        </tr>
                        
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr style="display:none;">
                                                                
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                 <td></td>
                                                                  <td  >{{totaldebit | number}}</td>
                                                                  <td  >{{totalcridit | number}}</td>
                                                                  
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


   
   
   
   
   
    <div class="modal fade" id="editdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Record</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                     
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">{{lable}} <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control"  ng-keyup="completeCustomer1()" placeholder="Search {{lable}}"  id="customerdata">
          
                                                                  
                                                                 
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                                <input type="hidden" id="customer_id" name="customer_id"  class="form-control">
                                                              <input type="hidden" id="party_type_data" name="party_type_data"  class="form-control">
                                                              <input type="hidden"  ng-model="hidden_id">
                                                              
                                                              
                                                              
                                                              <div class="form-group row" id="credit_data" >
                                                                <label class="col-sm-12 col-form-label">Credit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="credit" name="credit" ng-model="credit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <div class="form-group row" id="debit_data" >
                                                                <label class="col-sm-12 col-form-label">Debit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="debit" name="debit" ng-model="debit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payment Mode <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="payment_mode_payoff" id="payment_mode_payoff">
                                                                      
                                                                       <option value="">Select Mode</option>
                                                                       <option value="Cash">Cash</option>
                                                                       <option value="Cheque">Cheque</option>
                                                                       <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                       <option value="Petty Cash">Petty Cash</option>
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                                
                                                              <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"  ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                  </select>
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>
                                                             
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                                <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="name" ng-model="name" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="date" ng-model="create_date" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="bankstatementupdate()">Update</button>
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
  


   $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
    var valdationdate='<?php echo date("2024-01-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});

   $('#to-date').blur(function() 
 {


    
    var date = $(this).val();
     
    var valdationdate='<?php echo date("2024-01-01"); ?>';
    var valdationdate1='<?php echo date("Y-m-d"); ?>';
     if(valdationdate>date)
     {
         $('#to-date').val(valdationdate1);
     }

});


  
  
  $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
   
    $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='NEFT/RTGS' ||  val=='Cheque')
      {
          
         
          $('#base_title').html('Bank Account');
          var data='<option value="0">Select Bank</option> <?php foreach($bankaccount as $val) { if($val->id!=25 && $val->id!=24) { ?> <option value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
           $('#res_no').show();
           $('#bankaccountshow').show();
      }
      if(val=='Cash')
      {
          
          $('#base_title').html('Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==25) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#res_no').show();
          $('#bankaccountshow').show();
          
      }
       if(val=='Petty Cash')
      {
         
          $('#base_title').html('Petty Cash Account');
          var data='<?php foreach($bankaccount as $val) { if($val->id==24) { ?> <option seletced value="<?php echo $val->id ?>"><?php echo $val->bank_name ?>-<?php echo $val->account_no ?></option> <?php } } ?>';
          $('#bankaccount').html(data);
          $('#reference_no').show();
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
  
    url = '<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_export_all_base_by?limit=10&deleteid=0&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status;

 
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
          if(input != 0 && input != null){
              if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal
      }else{
        return '0';
      }
      

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
      $('#dateview').text(fromdate);
     $scope.fetchSingleData(userid);
   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
     $scope.fetchDatagetlegderGroup2();
     $scope.fetchDatagetlegderGroup3();
    
    
    
    
};

  
$scope.closing_bl='';
$scope.fetchDatagetlegderGroup2 = function(){
    
 var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status='<?php echo $_GET['type']; ?>';  
    var party_type= $('#party_type').val();


    $scope.loading = true;

     
    var payment_status='<?php echo $_GET['type']; ?>';  
    
    
    var id='<?php echo $accountshead; ?>';
    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_all_base_by1?limit=10&deleteid=0&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data)
    {
      
      
      
    
      
        $scope.getstatus = data.getstatus;
        $scope.balance = data.balance;
        if(data.valuess_dtotalvalue1 > 0){
          $scope.closing_bl = data.closing_bl;
        }
        
      
    });
  };


$scope.fetchDatagetlegderGroup3 = function(){
    

    $scope.loading = true;

     var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status='<?php echo $_GET['type']; ?>';  
    var party_type= $('#party_type').val();

     
    var payment_status='<?php echo $_GET['type']; ?>';  
    
    
    var id='<?php echo $accountshead; ?>';
    
    $http.get('<?php echo base_url() ?>index.php/report/fetch_data_get_ledger_view_all_base_by2?limit=10&deleteid=0&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data)
    {
      
      
      
      
        $scope.getstatus1 = data.getstatus;
        $scope.balance1 = data.balance;
      
      
     
      
    });
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



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
   
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'all_ledgers'}
      }).success(function(data){
        
        
            var userid= $('#choices-single-default').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status='<?php echo $_GET['type']; ?>';  
            var party_type= $('#party_type').val();
   
    
             $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
    
        
      }); 
    }
};

 $scope.editData = function(id){
     
     $('#debit_data').show();
     $('#credit_data').show();
     
      $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/report/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'all_ledgers'}
      }).success(function(data){
      
      
      
      
       
       $('#customerdata').val(data.party_name);
       $('#payment_mode_payoff').val(data.payment_mode);
      $('#customer_id').val(data.customer_id);
      $('#name').val(data.notes);
      
       $('#payment_mode_payoff').change();
      
       
       
       
       
       if(data.debit=='0')
       {
          // $('#debit_data').hide();
       }
       
         
        
       if(data.credit=='0')
       {
           //$('#credit_data').hide();
       }
       $('#party_type_data').val(data.party_type);
       
        $scope.debit = data.debit; 
        $scope.credit = data.credit; 
        $scope.lable = data.lable; 
       
        $scope.create_date = new Date(data.create_date); 
      
        $scope.hidden_id = data.id;
        $scope.submit_button = 'Update';
        
        
         $('#bankaccount').val(data.bank_id);
     
       });
    
       $('#editdata').modal('toggle');
       
       
       
       
    
};              

$scope.bankstatementupdate = function(){


                        var customerdata=$('#customerdata').val();
                        var customer_id=$('#customer_id').val();
                        var party_type_data=$('#party_type_data').val();
                        var bankaccount=$('#bankaccount').val();
                        var payment_mode_payoff=$('#payment_mode_payoff').val();
                         var notes=$('#name').val();
                         
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/report/updaterecord",
                        data:{'credit':$scope.credit,'customerdata':customerdata,'customer_id':customer_id,'bankaccount':bankaccount,'payment_mode_payoff':payment_mode_payoff,'party_type_data':party_type_data,'id':$scope.hidden_id,'debit':$scope.debit,'notes':notes,'create_date':new Date($scope.create_date)}
                        }).success(function(data)
                        {
                          
                                    $('#editdata').modal('toggle');
                                    var userid= $('#choices-single-default').val();
                                    var fromdate= $('#from-date').val();
                                    var fromto= $('#to-date').val();
                                    var payment_status='<?php echo $_GET['type']; ?>';  
                                    var party_type= $('#party_type').val();
                                    $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status,party_type);
                                                        
                    
                        });

};







 $scope.Getbankaccount = function () {
      
      
      
      
      
           $http({
              method:"POST",
              url:"<?php echo base_url() ?>index.php/bankaccount/fetch_single_data",
              data:{'id':$scope.getbank, 'action':'fetch_single_data','tablename':'bankaccount'}
            }).success(function(data){
                
                
                 $scope.bank_name = data.bank_name;
                 $scope.type = data.type;
                 $scope.account_no = data.account_no;
                 $scope.ifsc_code = data.ifsc_code;
                 $scope.current_amount = data.current_amount;
                 
                
             
            });
      
      
       
};   

















$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status,party_type){
    

    $scope.loading = true;

     
    var payment_status='<?php echo $_GET['type']; ?>';  
    var deleteid='<?php echo $deleteid; ?>';  
    
    
    var id='<?php echo $accountshead; ?>';
    
    $http.get('<?php echo base_url() ?>index.php/report_new/fetch_data_get_ledger_view_all_base_by?limit=10&deleteid='+deleteid+'&accountshead='+id+'&formdate='+fromdate+'&todate='+fromto+'&party_type='+party_type+'&payment_status='+payment_status).success(function(data){
      
      
       $scope.query = {}
      $scope.queryBy = '$';
      
      $scope.loading = false;
      
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
        
        
        
        
       var totalval=creditstotal-debitstotal;
      
        var sett=  Math.abs(totalval);

        $scope.totalval = sett.toFixed(2);
      
      
      
      
      
    });
  };
  
  
  
  $scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

  
  

  $scope.completeCustomer1=function(){
       
        
      
        var search=  $('#customerdata').val();
        
        var party_type_data=  $('#party_type_data').val();
        
        $("#customerdata" ).autocomplete({
        source: $scope.availableTags
        });
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party_type_data}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
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



<script type="text/javascript">
    
 $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("2024-01-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});


  $('#to-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("2024-01-01"); ?>';

     if(valdationdate>date)
     {
         $('#to-date').val(valdationdate);
     }

});
    
</script>
    
