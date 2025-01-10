 <?php
if($this->session->userdata['logged_in']['access']=='31')
{
  $customer_id=$this->session->userdata['logged_in']['userid'];
  $url=base_url().'index.php/customer/ledger_find?customer_id='.$customer_id.'&cnn_status=0';
  header("Location: $url");
}
include "header.php";
$cnn_status = 0;
$cnn_status_view = 1;
$cnn_text = "";
$cnn_text_view = "CNN";
if (isset($_GET['cnn_status'])) {
  if ($_GET['cnn_status'] == 1) {
    $cnn_status = 1;
    $cnn_status_view = 0;
    $cnn_text = "CNN";
    $cnn_text_view = "";
  }
}

$trail_balance=0;
if (isset($_GET['trail_balance'])) {
  $trail_balance=1;
}
?>

<style>
.trpoint {
    
    cursor: pointer;
   
}

td a {
    color: black;
}
th {
    padding: 10px 5px;
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


.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.table-bordered {
    border: 1px solid #e9e9ef;
    table-layout: fixed;
}

.table>tbody {
    vertical-align: middle;
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
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between pb-2">
                                    <h4 class="mb-sm-0 font-size-16"><?php echo $cnn_text; ?> Outstanding Customer ledger</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"><?php echo $cnn_text; ?> Outstanding Customer ledger !</li>
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
                              <div class="col-md-4" >
                                  
                                  
                                  <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" readonly ng-model="customer" ng-keyup="completeCustomer()" placeholder="Search Customer Or Phone"  id="choices-single-default">
          
           
                                  
                           
                            </div>
                            <div class="col">
                              <?php 

                               $party_type=0;
                              if(isset($_GET['party_type']))
                                                {
                                                   $party_type= $_GET['party_type'];
                                                }

                                                $dateset=date('2024-08-01');
                                                 if(isset($_GET['from_date']))
                                                {
                                                   $dateset= $_GET['from_date'];
                                                }
                                                $to_date=date('Y-m-d');

                                                if(isset($_GET['to_date']))
                                                {
                                                   $to_date= $_GET['to_date'];
                                                }
                                      
                              ?>
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('2024-04-01'); ?>" value="<?php echo $dateset; ?>">
                            </div>
                            <div class="col">
                               <input type="date" class="form-control" id="to-date" min="<?php echo date('2024-04-01'); ?>"   value="<?php echo $to_date; ?>">
                            </div>
                            <div class="col" style="display:none;">
                             <select class="form-control" id="payment_status">
                                 <option value="All">All</option>
                                 <option value="1">Paid</option>
                                 <option value="0">Un-Paid</option>
                             </select>
                            </div>
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>

                            
                            </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    <div id="search-view1" style="display:none;">
                       <div class="card-header pb-2 pt-2 ps-0"  ng-init="fetchSingleData(0)">
                            <h4 class="card-title ng-binding text-start pe-0 me-0">{{name}} | <span>{{phone}}</span> | <span>{{fulladdress}}</span></h4>
                        </div>
                    </div>
                     
                     <div class="row mb-2 mt-3" ng-init="fetchDatagetlegderGroupTotal(0)">
                         
                          
                           
                            <div class="col-xl-2 col-md-2">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body py-1">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h4 class="text-muted mb-3 font-size-14 lh-1 d-block text-truncate"><b>Total DR : </b>
                                                 
                                                </h4>


                                                  <p><b> <span >{{totaldebit | indianCurrency }}</span></b></p>
                                                
                                                
                                            </div>
        
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->


        
                            <div class="col-xl-2 col-md-2 ">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body py-1">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h4 class="text-muted mb-3 font-size-14 lh-1 d-block text-truncate"><b>Total CR : </b>
                                                 
                                                </h4>
                                                <p><b> <span >{{totalcridit | indianCurrency }}</span></b></p>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->

                          
                                

                             


                                 <div class="col-xl-2 col-md-2 ">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body py-1">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h4 class="text-muted mb-3 font-size-14 lh-1 d-block text-truncate"><b>Balance DR : </b>
                                                 
                                                </h4>
                                                
                                                 <p><b> <span >{{DRtotal | indianCurrency }}</span></b></p>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->


                            





                                 <div class="col-xl-2 col-md-2 ">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body py-1">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h4 class="text-muted mb-3 font-size-14 lh-1 d-block text-truncate"><b>Balance CR : </b>
                                                  
                                                   
                                                </h4>
                                                <p><b> <span >{{CRtotal | indianCurrency }}</span></b></p>
                                                
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->






                            
                         


                               <div class="col-xl-2 col-md-2" >
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body py-1">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h4 class="text-muted mb-3 font-size-14 lh-1 d-block text-truncate"><b>Balance</b>

                                                   
                                                </h4>

                                                <p><b>
                                                   <span  ng-if="getstatus1==1" style="color:red"> {{outstanding | indianCurrency}}</span>
                                                     <span  ng-if="getstatus1==0" style="color:green"> {{outstanding | indianCurrency}}</span>
                                                </b></p>
                                                
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->

                          
                            
        
                           
        
                            
                        </div>
                     
                     
                     
                     
                     
                     
                  
               
   
   <hr>
  
 
                  
          
                      <label for="showhiddenrow" style="float: right;margin: 9px 9px;display: none;">
                                  <input type="checkbox" id="showhiddenrow" checked>
                                  Show null balance
                              </label>    
              <!--<button type="button" ng-click="onview()" id="exportdatadata" class="btn btn-soft-success  waves-effect waves-light" style="float: right;margin: 24px 12px;">Receive Payment</button>-->
            
                       
                    <a href="<?php echo base_url(); ?>index.php/customer/ledger?cnn_status=<?php echo $cnn_status_view;  ?>"><?php echo $cnn_text_view;  ?> Ledger</a>
                   
                                        <input type="text" class="form-control rounded border ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                   
                   <div class="table-responsive mt-2">
                   
                   <table id="datatable"  class="table table-striped table-bordered" style="position: relative;" width="100%" ng-init="fetchDatagetlegderGroup(0)" >
                      <thead>
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th style="width:50px;"><h5 class="font-size-14 mb-0">No</h5></th>
                          
                          <th style="width:200px;"><h5 class="font-size-14 mb-0">Customer Name</th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Opening Balance DR </h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Opening Balance CR </h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Debit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Credit</h5></th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0">Balance DR</h5> </th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0">Balance CR</h5> </th>

                           


                        

                         
                          
                        </tr>
                      </thead>
                      
                        <tr class="setload" ><td colspan="6"><loading></loading></td></tr>
                      
                        <tbody  ng-repeat="namesvv in namesDataledgergroup | filter:query" >
                            
                            
                        <tr  class="trpoint {{namesvv.done_set}}" >
                          
                           <td>{{namesvv.no}}</td>
                          
                           
                           
                           <td>
                           <b style="color:#ff5e14;" ng-if="namesvv.name">{{namesvv.name}} <br></b>
                            <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank">

                            {{namesvv.company_name}}
                          </a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank">
                           
                            <span ng-if="namesvv.opening_balance_dr!=0" style="color: red;">{{namesvv.opening_balance_dr | indianCurrency}}</span></a>

                          </td>
                          <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank"><span ng-if="namesvv.opening_balance_cr!=0" style="color: green;">{{namesvv.opening_balance_cr | indianCurrency}} </span></a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank"><span ng-if="namesvv.debits!=0">{{namesvv.debits | indianCurrency}}</span></a></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank"><span ng-if="namesvv.credits!=0">{{namesvv.credits | indianCurrency}}</span></a></td>
                           


                           <td>
                             <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank" ng-if="namesvv.balance!=0"><span  ng-if="namesvv.getstatus==1" style="color:red">{{namesvv.balance | indianCurrency}}</a></span>
                             </a>
                           </td>


                            <td>
                    <a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.customer_id}}&cnn_status=<?php echo $cnn_status; ?>" target="_blank" ng-if="namesvv.balance!=0">
                             <span  ng-if="namesvv.getstatus==0" style="color:green">{{namesvv.balance | indianCurrency}}</span></a>
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
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>

 
    <div class="modal fade" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Payment Receive</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                               
                                                             <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" required data-trigger name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Ledger Account</option>
                                                                      <?php
                                                                      foreach ($accountheads as $val)
                                                                      { 
        
                                                                      ?>
                                                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                      
                                                                      <?php
                                                                      
                                                                      }
        
                                                                      ?>
                                                                    </select>
                                                                 </div>
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
                                                                      
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                                  
                                                              <div class="form-group row" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Payment Type <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="payment_type" id="payment_type">
                                                                      
                                                                       <option value="Credit">Credit</option>
                                                                       <option value="Debit">Debit</option>
                                                                       
                                                                  </select>
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              <div class="form-group row" id="bankaccountshow" style="display:none;">
                                                                <label class="col-sm-12 col-form-label" id="base_title">Bank Account </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  
                                                                  <select class="form-control" name="bankaccount"   ng-change="Getbankaccount()" ng-model="getbank" id="bankaccount">
                                                                      
                                                                      
                                                                      
                                                                      
                                                                  </select>
                                                                  
                                                                   <span ng-if="account_no"> <b> Available Balance : {{current_amount | number}}</b></span>
                                                             
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Reference No <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="reference_no" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Enter Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                               
                                                                 <input type="number" min="0" onkeypress="return isNumberKey(event)" id="pendingamount" class="form-control">
                                                                 <input type="hidden"   value="{{totalblance}}" id="payamount" class="form-control">
                                                                 
                                                                  
                                                                </div>
                                                              </div>
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <br>
                                                             <div class="form-group " >
                                                                <label  for="writeoff">Write Off </label>
                                                                <input type="checkbox" id="writeoff" >
                                                                
                                                              </div>
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" ng-click="pointtodriver()">Payment Save</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>









    <div class="modal fade" id="firstmodalcommisonparty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Internal Transaction</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                                       
                                                             <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" required data-trigger name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Ledger Account</option>
                                                                      <?php
                                                                      foreach ($accountheads as $val)
                                                                      { 
        
                                                                      ?>
                                                                            <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                      
                                                                      <?php
                                                                      
                                                                      }
        
                                                                      ?>
                                                                    </select>
                                                                 </div>
                                        </div>                            
                                    </div>
                             
                                                               
                                                               
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payer  <span style="color:red;">*</span></label>
                                                                
                                                                
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer1" checked value="1" id="Customer" />
                                                                    <label for="Customer">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer1" value="3" id="Vendor" />
                                                                    <label for="Vendor">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer1" value="2" id="Driver" />
                                                                    <label for="Driver">Driver</label>
                                                                    <input type="radio" class="radio" name="Payer1" value="5" id="Other" />
                                                                    <label for="Other">Others Ledger</label>
                                                                  </div>
                                                                                                                           
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Names"  id="party1">
          
                                                                  
                                                                  <br>
                                                                  <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                              <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee 1  <span style="color:red;">*</span>  <button type="button" style="float: right;" ng-click="Payee2()" class="btn btn-outline-danger btn-sm ng-scope"><i class="mdi mdi-plus menu-icon"></i></button>
                                                               </label>
                                                                
                                                                 
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer2" checked value="1" id="Customer2" />
                                                                    <label for="Customer2">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer2" value="3" id="Vendor2" />
                                                                    <label for="Vendor2">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer2" value="2" id="Driver2" />
                                                                    <label for="Driver2">Driver</label>
                                                                     <input type="radio" class="radio" name="Payer2" value="5" id="Other2" />
                                                                     <label for="Other2">Others Ledger</label>
                                                                     
                                                                  </div>
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance2()"  ng-keyup="completeCustomer2()" placeholder="Search Names"  id="party2">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance2 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              <div class="show2" style="display:none;">
                                                                  
                                                                    <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Payee 2 <span style="color:red;">*</span>  
                                                               </label>
                                                                
                                                                 
                                                                <div class="some-class">
                                                                    <input type="radio" class="radio" name="Payer3" checked value="1" id="Customer3" />
                                                                    <label for="Customer3">Customer</label>
                                                                    <input type="radio" class="radio" name="Payer3" value="3" id="Vendor3" />
                                                                    <label for="Vendor3">Vendor</label>
                                                                    <input type="radio" class="radio" name="Payer3" value="2" id="Driver3" />
                                                                    <label for="Driver3">Driver</label>
                                                                    
                                                                      <input type="radio" class="radio" name="Payer3" value="5" id="Other3" />
                                                                     <label for="Other3">Others Ledger</label>
                                                                     
                                                                     
                                                                  </div>
                                                                <div class="col-sm-12">
                                                                  
                                                              <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance3()"  ng-keyup="completeCustomer3()" placeholder="Search Names"  id="party3">
          
                                                                         <br>
                                                                  <span ng-if="opening_balance2"><b>Avilable Balance : {{opening_balance3 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  min="0" onkeypress="return isNumberKey(event)" id="amount2" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                                  
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes_r" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="payment_date_1" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                            
                                                           
                                                            <div class="row" style="margin: 20px -9px;">
                                                          
                                                            
                                                            <div class="col-md-12">
                                                              <div class="form-group row">
                                                                
                                                                <div class="col-sm-12">
                                                                    
                                                                 <button type="submit" class="btn btn-primary w-md" style="float: right;" id="savebutton" ng-click="transfer()">Payment Transfer</button>
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

$('#showhiddenrow').on('click',function(){
      
      if ($(this).is(':checked')) {
        
        
        $('.trpoint ').addClass('d-none');
        $('.d-none1').removeClass('d-none');
        
      } else {
         
        $('.trpoint').removeClass('d-none');
        
      }
      
      
      
  });
 $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("2024-08-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});
    
  $("#exportdatadata").hide();
   
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
      
      
      
      
  });
   
      
 
      
  $('#choices-single-default').on('change',function(){
      
      
      
      
       $("#exportdatadata").show();
        
      
  });
  
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
    var cnn_status = '<?php echo $cnn_status; ?>';
  
    url = '<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_export_group_outstanding_customer_ledger?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&cnn_status=' + cnn_status;

 
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

app.filter('indianCurrency', function () {
         return function (input) {
        if (isNaN(input)) return input;
        var formattedValue = parseFloat(input);
        // console.log(input.toLocaleString('en-IN').toFixed(2));
         var decimal =  formattedValue.toLocaleString('en-IN', {   minimumFractionDigits: 2, maximumFractionDigits: 2 });

        return decimal

         };
      });

app.directive('autoComplete', function($timeout) {
    return function(scope, iElement, iAttrs) {
            iElement.autocomplete({
                source: scope[iAttrs.uiItems],
                select: function() {
                    $timeout(function() {
                      iElement.trigger('input');
                    }, 0);
                }
            });
        };
    });

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
 $scope.getbank=0
    

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

$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
    var payment_status= $('#payment_status').val();
   
      $('#search-view').show();
     $('#exportdatadata').show();
     $scope.fetchSingleData(userid);


        var result = userid.split('-');
     $scope.c_id=result[0];

   
     $scope.fetchDatagetlegderGroup(userid,fromdate,fromto,payment_status);
     $scope.fetchDatagetlegderGroupTotal(userid,fromdate,fromto,payment_status);
    
    
    
    
};





 $scope.Getbalance1 = function () {
      
      
        var party=  $('#party1').val();
        var party_type= $("input[name='Payer1']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance1 = data.opening_balance;
                 
                
             
            });
            
            
          if(party!='')
            {         
            $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                       // alert('Name Not Found'); 
                        $('#party1').css("border-color", "red");
                   }
                   else
                   {
                        $scope.accountshead = data;
                         $('#savebutton').show();
                         $('#party1').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   












 $scope.Getbalance2 = function () {
      
      
        var party=  $('#party2').val();
        var party_type= $("input[name='Payer2']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance2 = data.opening_balance;
                 
                
             
            });
            
            
            
            
            
            if(party!='')
            {
                
            
             $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                        //alert('Name Not Found'); 
                        $('#party2').css("border-color", "red");
                   }
                   else
                   {
                        
                         $('#savebutton').show();
                         $('#party2').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   




 $scope.Getbalance3 = function () {
      
      
        var party=  $('#party3').val();
        var party_type= $("input[name='Payer3']:checked").val();
      
           $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
              data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
            }).success(function(data){
                
                
              
                 $scope.opening_balance3 = data.opening_balance;
                 
                
             
            });
            
            
            
            
            
            if(party!='')
            {
                
            
             $http({
              method:"POST",
              url:"<?php echo base_url(); ?>index.php/manual_journals/fetch_get_accounthead",
              data:{'id':party, 'action':'fetch_single_data','tablename':party_type}
             }).success(function(data){
                
                   if(data.error=='0')
                   {
                        $('#savebutton').hide();
                        //alert('Name Not Found'); 
                        $('#party3').css("border-color", "red");
                   }
                   else
                   {
                        
                         $('#savebutton').show();
                         $('#party3').css("border-color", "green");
                   }
                
                
             
            });
            
            }
      
      
      
};   






$scope.onview = function(id,billno,pendingamount,resno){
     $('#firstmodalcommison').modal('toggle');
     
     
     $scope.bill_no=billno;
     $scope.payid=id;
     $scope.pendingamount=pendingamount;
     $scope.payamount=pendingamount;
     
     
     $('#reference_no').val(resno);
     
    
  
    
};



               
$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

                        

     $scope.completeCustomer=function(){
       
        
      
        var search=  $('#choices-single-default').val();
        
        
        
   
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':'11'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
        
         $("#choices-single-default" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
    
    }; 
                        
   $scope.completeCustomer1=function(){
       
        
      
        var search=  $('#party1').val();
        
        
        
       var party= $("input[name='Payer1']:checked").val();
       
       
      
        
        $( "#party1" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
    
    
     $scope.completeCustomer2=function(){
       
        
      
        var search=  $('#party2').val();
        
           var party= $("input[name='Payer2']:checked").val();
        
        $( "#party2" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    
    
   

$scope.completeCustomer3=function(){
       
        
      
        var search=  $('#party3').val();
        
           var party= $("input[name='Payer3']:checked").val();
        
        $( "#party3" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':party}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 
    
    






 $scope.transfer = function () {
           
           
            var party1= $('#party1').val();
            var party2= $('#party2').val();







            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= parseFloat($('#amount').val());
            
            var notes= $('#notes_r').val();
             
             var party_type1= $("input[name='Payer1']:checked").val();
             var party_type2= $("input[name='Payer2']:checked").val();
              
            
           if(party1!='' && party2!='')
           {        
               
                     if(enteramount>0)
                     {       
                          var enteramount2= parseFloat($('#amount2').val());
                          if(enteramount2>0)
                          {
                              var totalamount= enteramount+enteramount2;
                              
                          }
                          else
                          {
                              var totalamount= enteramount;
                          }
                           
                          
                          
                          
                          
                          
                          $scope.saveTransfer(party1,party2,fromdate,fromto,totalamount,notes,party_type1,party_type2);
                          $scope.saveTransfer1(party2,party1,fromdate,fromto,enteramount,notes,party_type2,party_type1);
                          
                          
                          var party3= $('#party3').val();
                          var enteramount2= parseFloat($('#amount2').val());
                          var party_type3= $("input[name='Payer3']:checked").val();
                          if(enteramount2>0)
                          {
                                $scope.saveTransfer1(party3,party1,fromdate,fromto,enteramount2,notes,party_type3,party_type1);
                          }
                         
                         
                        $('#party1').val('');
                        $('#party2').val('');
                        $('#party3').val('');
                        $('.show2').hide();
                        $('#amount2').val('');
                        $('#amount').val('');
                        $('#notes_r').val('');


                               var customer_id1=party1.split("-")[0];
                               var customer_id2=party2.split("-")[0];
   

                               if(customer_id1>0)
                               {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id1).success(function(datass){});

                              }

                                if(customer_id2>0)
                               {


                                  $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id2).success(function(datass){});

                              }

                          
                     }
                     else
                     {
                         alert('Enther The Amount');
                     }
                      
           
           }
           else
           {
               
                   alert('Select The Names');
            
           }

                       
                
                
                
                
           
           


};


$scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){



 var payment_date= $('#payment_date_1').val();
 
 
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes,party_type1,party_type2){

var payment_date= $('#payment_date_1').val();

                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay_transfer1",
                        data:{'notes':notes,'payment_date':payment_date,'enteramount':enteramount,'customer_id':party1,'customer_id2':party2,'account_head_id':$scope.account_head_id,'party_type1':party_type1,'party_type2':party_type2}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(0);
                           $scope.fetchDatagetlegderGroupTotal(0);
    
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};









 $scope.pointtodriver = function () {
           
           
            var userid= $('#choices-single-default').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var payment_status= $('#payment_status').val();
            
            var payment_mode_payoff= $('#payment_mode_payoff').val();
            var reference_no= $('#reference_no').val();

            var enteramount= parseFloat($('#pendingamount').val());
            var customer_id= $('#choices-single-default').val();
            var payamount= parseFloat($('#payamount').val());
             var notes= $('#notes').val();
               var notes= $('#notes').val();
             
              var bankaccount= $('#bankaccount').val();
              var payment_type= $('#payment_type').val();
              
              
              
            
        if($("#writeoff").prop('checked') == true)
        {
             var writeoff=1;
        }
        else
        {
             var writeoff=0;
        }



           
                   var valuses=0;
                  var valuses1=0;
                  if(bankaccount!=0)
                  {
                       
                     
                    var valuses=1;
                        
                  } 
                  else
                  {
                      alert('Select Payment Account');
                  }
                  
                  
                   if(payment_mode_payoff!=0)
                   {
                       
                     var valuses1=1;
                   
                   } 
                   else
                   {
                      alert('Select Payment');
                   }
                
                
                     if(valuses1!=0 && valuses!=0)
                     {
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/customer/save_to_pay",
                        data:{'notes':notes,'account_head_id':$scope.account_head_id,'enteramount':enteramount,'payment_type':payment_type,'bankaccount':bankaccount,'writeoff':writeoff,'customer_id':customer_id,'payamount':payamount,'payment_mode_payoff':payment_mode_payoff,'reference_no':reference_no}
                        }).success(function(data){
                          
                          
                           
                           $scope.fetchDatagetlegderGroup(data.id,fromdate,fromto,payment_status);
                           $scope.fetchDatagetlegderGroupTotal(data.id,fromdate,fromto,payment_status);
    
                           $('#firstmodalcommison').modal('toggle');
                           
                            $('#payment_mode_payoff').val('');
                               $('#reference_no').val('');
                               $('#pendingamount').val('');
                               $('#notes').val('');
                               $('#bankaccount').val('');
                           
                    
                        });
                        
                     }

                
           
           


}
$scope.Payee2 = function(){
    
    $('.show2').toggle();
};

$scope.fetchDatagetlegderGroup = function(id,fromdate,fromto,payment_status){
    
        var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
    var cnn_status = '<?php echo $cnn_status; ?>';

    var trail_balance = '<?php echo $trail_balance; ?>';

$scope.loading = true;
    
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_group_new?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&cnn_status=' + cnn_status+'&trail_balance=' + trail_balance).success(function(data){
     
      $scope.loading = false;
      $scope.query = {}
      $scope.queryBy = '$';
      
     
      $('#choices-single-default').attr('readonly',false);
     
       $scope.namesDataledgergroup = [];
          var dataLength = data.length; 
          var splitCount = 400; 
          var currentIndex = 0; 

          function addRecordsToData() {
            var endIndex = currentIndex + splitCount;

            var chunk = data.slice(currentIndex, endIndex);

            $scope.$apply(function() {
              $scope.namesDataledgergroup = $scope.namesDataledgergroup.concat(chunk);
            });

            currentIndex = endIndex;

            if ($scope.namesDataledgergroup.length >= dataLength) {
              clearInterval(intervalId);
            }
          }
          var intervalId = setInterval(addRecordsToData, 500);
      
      var totaldebit=0;
      
 for(var i = 0; i < data.length; i++){
            var debits = parseFloat(data[i].debits);
            totaldebit += debits;


            
        }




      var totalcridit=0;
      
 for(var i = 0; i < data.length; i++){
            var credits = parseFloat(data[i].credits);
            totalcridit += credits;


            
        }






         $scope.totaldebit = totaldebit.toFixed(2);
        $scope.totalcridit = totalcridit.toFixed(2);
            

      var trail_balance = '<?php echo $trail_balance; ?>';
        var DRtotal = 0;
     //  if(trail_balance==1)
     //  {
     //        var DRtotal = 71253;
     //  }
     
        
        for(var i = 0; i < data.length; i++){


//var customer_id=data[i].customer_id;
// $http.get('https://erp.zaron.in/customer_balance_cron.php?customer_id='+customer_id).success(function(datass){});
     

            var DR = parseFloat(data[i].DR);
            DRtotal += DR;
        }
      
      
      
        $scope.DRtotal = DRtotal.toFixed(2);
      
      
      
      
      
         var CRtotal = 0;
        for(var i = 0; i < data.length; i++){
            var CR = parseFloat(data[i].CR);
            CRtotal += CR;


            
        }
      
      
      
        $scope.CRtotal = CRtotal.toFixed(2);
      
      
      
      
      
      
     
      
      
      
      
    });
  };
  
  
  
  
  
  
$scope.fetchDatagetlegderGroupTotal = function(id,fromdate,fromto,payment_status){
    
 var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();


            
     var cnn_status = '<?php echo $cnn_status; ?>';
     var trail_balance = '<?php echo $trail_balance; ?>';
    $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_get_ledger_view_total_group?limit=10&customer_id='+id+'&formdate='+fromdate+'&todate='+fromto+'&payment_status='+payment_status+'&cnn_status=' + cnn_status+'&trail_balance=' + trail_balance).success(function(data){
      
      
      
      
        $scope.totalpayment = data.totalpayment;
        $scope.totalpaid = data.totalpaid;
        $scope.totalblance = data.totalblance;
        
        
        //$scope.totaldebit = data.totaldebit;
        //$scope.totalcridit = data.totalcridit;
        
        $scope.outstanding = data.outstanding;
        $scope.getstatus = data.getstatus;
        $scope.getstatus1 = data.getstatus1;
    
      
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
 
    




</body>

 </html>

