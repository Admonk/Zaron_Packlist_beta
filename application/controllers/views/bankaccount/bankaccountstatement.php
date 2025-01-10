<?php  include "header.php"; ?>
<style>
     #pristine-valid-common .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
         }
         .table>tbody {
    vertical-align: middle;
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
         .loading {
    text-align: center;
}

.ui-widget.ui-widget-content {
    border: 1px solid #d3d3d3;
    z-index: 999999;
}
.bgcolorchange {
    background: #ededed;
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
                                    <h4 class="mb-sm-0 font-size-14">Bank Accounts & Transactions </h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Bank Accounts & Transactions</li>
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

        <?php

$search_date=date('Y-m-01');
if(isset($_GET['search_date']))
{
   $search_date= $_GET['search_date'];
   
}

        ?>
                   
                    
                    <div class="col-lg-12" >  
                      <form>
                          <div class="row">
                              <div class="col-md-4" >
                              <select class="form-control" data-trigger name="choices-single-default"
                                                            id="choices-single-default"
                                                            placeholder="This is a search">
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
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo $search_date; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" min="<?php echo date('Y-07-01'); ?>" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" id="exportdata" class="btn btn-success waves-effect waves-light"  >Export</button>
                             
                              <a href="<?php echo base_url(); ?>index.php/bankaccount/statement_delete_log?bank_id=<?php echo $bank_id; ?>&name=<?php echo $name; ?>" target="_blank">Delete Log</a>
                             
                             
                            </div>
                           
                          </div>
                      </form>
                       
                   
                   
                        
                    </div>
                    
                </div>





<hr>


                        <div class="row">
                            <div class="col-xl-8">
                                <div class="text-center">
                                    <h4 class="card-title font-size-14 text-start">{{bank_name}} | 
                                    <span class="btn btn-secondary font-size-13 badge">Form Date :  {{ fromdate | date : "dd-MM-yyyy"}} To Date :  {{ todate | date : "dd-MM-yyyy"}}</span></h4>
                                </div>
                            </div>
                            
                            <div class="col-xl-4" >
                                                                  
                                                            <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2'  || $this->session->userdata['logged_in']['access']=='5')
   {
       
       ?>  
                               <button type="button" ng-click="onviewparty()"  class="btn btn-soft-danger  waves-effect waves-light" style="float: right;margin: 0px 12px;">Bank to Bank Transfer</button>
                                        
       <?php
                                                
   }
  
  ?>
            
                            </div>
                        </div>  
               
               <hr>
               
                        <div class="row" ng-init="fetchDatadetailsTotal(<?php echo $bank_id; ?>)">

                                 <div class="col-xl-3 col-md-3">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Opening Balance: 
                                                  <span ng-if="opstatus==1" style="color:red" class="ng-binding ng-scope">{{totals_opeing | number}}</span>
                                                  <span ng-if="opstatus==0" style="color:green" class="ng-binding ng-scope">{{totals_opeing | number}}</span>
                                                </h3>
                                                <small id="dateview">{{ fromdate | date : "dd-MM-yyyy"}}</small>
                                            </div>
                                             
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->



                            <div class="col-xl-3 col-md-3">
                                <div class="card shadow-none card-h-50 mb-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Debit: <span class="ng-binding">{{totalbalancec | number}}</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Total Credit: <span class="ng-binding">{{totalbalanced | number}}</span></h3>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                          
                             <div class="col-xl-3 col-md-3">
                                <!-- card -->
                                <div class="card shadow-none card-h-50 mb-0">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                        
                                             <div class="flex-grow-1">
                                                <h3 class="text-muted mb-1 font-size-14 lh-1 d-block text-truncate">Current Balance: 
                                                  <span ng-if="cgetstatus==1" style="color:red" class="ng-binding ng-scope">{{ctotalbalance | number}}</span>
                                                  <span ng-if="cgetstatus==0" style="color:green" class="ng-binding ng-scope">{{ctotalbalance | number}}</span>
                                                </h3>
                                            </div>
                                             </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
                        </div>
                
                
                
                                        <input type="text" class="form-control rounded border mt-4 ng-pristine ng-valid ng-touched" placeholder="Search..." ng-model="query[queryBy]">
                                        <!--<i class="bx bx-search search-icon"></i>-->
                                        
                                        <div class="tab-content text-muted mt-4 mt-xl-0" id="v-pills-tabContent" ng-init="fetchDatadetails(<?php echo $bank_id; ?>)">
                                            <div class="tab-pane fade active show" id="v-price-one" role="tabpanel" aria-labelledby="v-pills-tab-one">
                                                <div class="table-responsive text-center pricing-table-bg">
                                                    <table class="table table-bordered" style="font-size:11.5px;position: relative;">
                                                        
                                                            <tr style="position: sticky;top: 0;background: #dfdfdf;">
                                                                  <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Date</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Particulars</h5>
                                                                    
                                                                </td>
                                                              
                                                                <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Chq/Ref.No</h5>
                                                                   
                                                                </td>
                                                                
                                                                  <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Debit</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                   <td style="width: 10%;text-align: left;">
                                                                    
                                                                        <h5 class="font-size-12 mb-0">Credit</h5>
                                                                    
                                                                </td>
                                                                
                                                                 <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Balance</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                 <td style="width: 15%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Narration</h5>
                                                                    
                                                                </td>


                                                                <td style="width: 15%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">User</h5>
                                                                    
                                                                </td>
                                                               
                                                               
                                                              
                                                              
                                                                
                                                                <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-12 mb-0">Action</h5>
                                                                    
                                                                </td>
                                                               
                                                            </tr>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                              <tr class="setload" ><td colspan="8"><loading></loading></td></tr>

                                                            <tbody ng-repeat="namess in namesDatadetails | filter:query">
                                                            <tr ng-if="namess.no=='OP1'" style="font-weight: 800;">
                                                               
                                                               
                                                               <td style="text-align: left;">{{namess.create_date}}</td>
                                                               <td style="text-align: left;"> <b>Opening Balance</b>  </td>
                                                               <td style="text-align: left;"> </td>
                                                               
                                                                <td style="text-align: left;"><span ng-if="namess.credit!=0">{{namess.credit | number}}</span></td>
                                                               <td style="text-align: left;"><span ng-if="namess.debit!=0">{{namess.debit | number}}</span></td>

                                                               <td style="text-align: left;">
                                                               <span  ng-if="namess.getstatus==1" style="color:green">{{namess.balance | number}}</span>
                                                               <span  ng-if="namess.getstatus==0" style="color:red">{{namess.balance | number}}</span>
                                                               </td >
                                                               <td style="text-align: left;"></td>
                                                               <td style="text-align: left;"></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                            
                                                            <tbody ng-repeat="namess in namesDatadetails | filter:query">
                                                            <tr ng-if="namess.no!='OP1'" class="{{namess.addclass}}">
                                                               
                                                               
                                                               <td style="text-align: left;">{{namess.create_date}}</td>
                                                              
                                                               
                                                                <td style="text-align: left;">
                                                                   <span ng-if="namess.name">{{namess.name}}</span> 
                                                                  
                                                                </td>
                                                                
                                                                
                                                                <td style="text-align: left;">
                                                                    
                                                                    <span ng-if="namess.status_by=='Opening Balance'">000001</span>
                                                                    <span ng-if="namess.status_by!='Opening Balance'">{{namess.ex_code}}</span>
                                                                    
                                                                </td>
                                                                
                                                                
                                                              
                                                               
                                                                <td style="text-align: left;">
                                                                   
                                                                    
                                                                    <span ng-if="namess.credit!=0"> {{namess.credit | number}}</span>
                                                                </td >

                                                                  <td style="text-align: left;">
                                                                    
                                                                    <span ng-if="namess.debit!=0"> {{namess.debit | number}}</span>
                                                                </td>
                                                                 
                                                                 
                                                                 
                                                                 <td style="text-align: left;">
                                                                 
                                                                      <span  ng-if="namess.getstatus1==1" style="color:green">{{namess.balance | number}}</span>
                                                                      <span  ng-if="namess.getstatus1==0" style="color:red">{{namess.balance | number}}</span>
                                            
                                                                    
                                                                </td >



                                                               
                                                                
                                                                <td style="text-align: left;">
                                                                      <span ng-if="namess.status_by">{{namess.status_by}}</span> 
                                                                      <samll ng-if="namess.amount!=0"><br>{{namess.username}} {{namess.amount}}</samll>
                                                                </td>

                                                                 <td style="text-align: left;">
                                                                   
                                                                    
                                                                    <span > {{namess.username_base}}</span>
                                                                </td >
                                                                 
                                                                 
                                                                 <td  align="center" style="display:flex;">
                                                                     
                                                            <?php
  
   if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='14' || $this->session->userdata['logged_in']['access']=='2'  || $this->session->userdata['logged_in']['access']=='5')
   {
       
       ?>       
                           <button type="button" ng-click="editData(namess.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-pencil menu-icon"></i></button>
                           <button type="button" ng-click="deleteData(namess.id)" class="btn btn-outline-danger btn-sm"><i class="mdi mdi-delete menu-icon"></i></button>
     <?php

                                                           }
                                                           

                                                        ?>

                       </td>
                               
                                                      
                                                                 </td>
                                                                </tr>
                                                            </tbody> 
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            
                                                              <tr ng-show="namesDatadetails.length==0">
                                                               <td colspan="6"> No Transactions </td>           
                                                             </tr>
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                        
                                                       
                                                    </table>
                                                </div>
                                            </div>

                                           
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <!-- end col -->
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Bank To Bank Payment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                            
                                                            
                                                            
                                                             <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account</b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" data-trigger required  name="accountshead"  ng-model="account_head_id" >
                                             
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
                                                                <label class="col-sm-12 col-form-label">Payeer  <span style="color:red;">*</span></label>
                                                               
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
                                                                <label class="col-sm-12 col-form-label">Receiver  <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                            
                                                                      <select class="form-control" data-trigger name="party2"
                                                            id="party2"
                                                            placeholder="This is a search"  ng-change="Getbankaccount2()" ng-model="getbank2">
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
                                                                        
                                                                  <span ng-if="opening_balance2"><b>Available Balance : {{opening_balance2 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="res_no" >
                                                                <label class="col-sm-12 col-form-label">Enter The Amount <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="textt" onkeypress="return isNumberKey(event)" id="amount" name="amount" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>



                                                                <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Payment Date </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="date" id="create_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">Notes </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="notes_r" class="form-control">
                                                                  
                                                                  
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit Bank Statement</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                                <div class="col-md-12" style="display:none;">
                                     <div class="form-group row">
                                          <label class="col-sm-12 col-form-label"><b>Ledger Account </b> <span style="color:red;">*</span> </label>
                                                                 <div class="col-sm-12">
                                                                     <select  class="form-control" data-trigger required  name="accountshead"  ng-model="account_head_id" >
                                             
                                                                     <option value="">Select Ledger Account </option>
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
                                                                <label class="col-sm-12 col-form-label">Bank Name <span style="color:red;">*</span></label>
                                                               
                                                                <div class="col-sm-12">
                                                                    
                                                                    
                                                                    
                                                           <select class="form-control"   ng-change="Getbankaccount3()" ng-model="bankname">
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
                                                                    
                                                                  <span ng-if="opening_balance3"><b>Available Balance : {{opening_balance3 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                              
                                                                 
                                                            
                                                              
                                                              
                                                              
                                                               
                                                              
                                                              
                                                               <div class="form-group row" id="debit_data" >
                                                                <label class="col-sm-12 col-form-label">Credit Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  onkeypress="return isNumberKey(event)" id="debit" name="debit" ng-model="debit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              <input type="hidden"  ng-model="hidden_id">
                                                              
                                                              
                                                              
                                                              <div class="form-group row" id="credit_data" >
                                                                <label class="col-sm-12 col-form-label">Debit  Amount </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text"  onkeypress="return isNumberKey(event)" id="credit" name="credit" ng-model="credit" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                            
                                                              
                                                              
                                                              
                                                            
                                                             
                                                              <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Status By </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="status_by" ng-model="status_by" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                                 <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Chq/Ref.No</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="ex_code" ng-model="ex_code" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                                <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Notes</label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="name" ng-model="name" class="form-control">
                                                                  
                                                                  
                                                                </div>
                                                              </div>
                                                              
                                                                 <div class="form-group row" id="credit_data" style="display:none;">
                                                                <label class="col-sm-12 col-form-label">If Change Customer  </label>
                                                               
                                                                <div class="col-sm-12">
                                                                  
                                                                  <input type="text" id="changecustomer"  ng-keyup="completeCustomer1()" ng-blur="Getbalance1()" name="changecustomer" ng-model="changecustomer" class="form-control">
                                                                  
                                                                  <span ng-if="opening_balance1"><b>Available Balance : {{opening_balance1 | number}}</b></span>
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              
                                                               <div class="form-group row" >
                                                                <label class="col-sm-12 col-form-label">Date</label>
                                                               
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

<script>

$(document).ready(function(){

 $('#from-date').blur(function() 
 {

    
    var date = $(this).val();
     
     var valdationdate='<?php echo date("Y-07-01"); ?>';

     if(valdationdate>date)
     {
         $('#from-date').val(valdationdate);
     }

});


 $('#date').blur(function() 
 {

    
    var date = $(this).val();
     

       var valdationdate='<?php echo date("Y-07-01"); ?>';
      var valdationdate1='<?php echo date("Y-m-d"); ?>';

     if(valdationdate>date)
     {
         $('#date').val(valdationdate1);
     }

});



$('#create_date').blur(function() 
{

    
    var date = $(this).val();
     
       var valdationdate='<?php echo date("Y-07-01"); ?>';
      var valdationdate1='<?php echo date("Y-m-d"); ?>';

     if(valdationdate>date)
     {
         $('#create_date').val(valdationdate1);
     }

});
    
$('#exportdata').on('click', function() {
  
  
    var id= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
   
  
    url = '<?php echo base_url() ?>index.php/bankaccount/export_bank_statement_full?limit=10&deleteid=0&account_id='+id+'&formdate='+fromdate+'&todate='+fromto;

 
    location = url;

});
});

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

   $('#choices-single-default').val(<?php echo $bank_id; ?>);
   
   $scope.bank_name = '<?php echo $name; ?>';
   

$scope.fromdate='<?php echo date("01-m-Y"); ?>';
$scope.todate='<?php echo date("d-m-Y"); ?>';

  $scope.submit_button = 'Create';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data').success(function(data){
      $scope.namesData = data;
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


$scope.Getbankaccount3 = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.bankname, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.opening_balance3 = data.current_amount;
		         
		        
		     
		    });
      
      
      
};  

  
  
  $scope.Getbankaccount2 = function () {
      
      
      
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data",
		      data:{'id':$scope.getbank2, 'action':'fetch_single_data','tablename':'bankaccount'}
		    }).success(function(data){
		        
		        
		         $scope.opening_balance2 = data.current_amount;
		         
		        
		     
		    });
      
      
      
};   



$scope.getvalOpeingBalance = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= '<?php echo date("d-m-Y"); ?>';
    var fromto= '<?php echo date("d-m-Y"); ?>';
    
    var fromdatess= '<?php echo date("d-m-Y"); ?>';
    $scope.fromdateset=fromdatess;
    //$scope.fetchDatadetailsopeingbalance(userid,fromdate,fromto);
   
    
    
};
  
  
$scope.search = function(){
    
    var userid= $('#choices-single-default').val();
    var fromdate= $('#from-date').val();

     var valdationdate='<?php echo date("Y-07-01"); ?>';

     if(valdationdate>fromdate)
     {
         var fromdate= valdationdate;
         $('#from-date').val(valdationdate);
     }



    var fromto= $('#to-date').val();
    
        
    $scope.fromdate=fromdate;
    $scope.todate=fromto;



    var name=$("#choices-single-default option:selected"). text();
    
    $scope.bank_name = name;
    
    $scope.fetchDatadetails(userid,fromdate,fromto);
   
    
    $scope.fromdateset=fromdate;

     $scope.fetchDatadetailsTotal(userid,fromdate,fromto);

    //$scope.fetchDatadetailsopeingbalance(userid,fromdate,fromdate);
    
    
};



$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};



$scope.Getbalance1 = function () {
      
      
           var party=  $('#changecustomer').val();
      
      
           $http({
		      method:"POST",
		      url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
		      data:{'id':party, 'action':'fetch_single_data','tablename':'customers'}
		    }).success(function(data){
		        
		        
		      
		         $scope.opening_balance1 = data.opening_balance;
		         
		        
		     
		    });
      
      
      
};   











  $scope.completeCustomer1=function(){
       
        
   
        var search=  $('#changecustomer').val();
        
        
        
        $("#changecustomer" ).autocomplete({
         
          source: $scope.availableTags
          
          
        });
    
    
    
    
        $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/manual_journals/userget",
          data:{'search':search,'party_type':'1'}
        }).success(function(data){
    
              $scope.availableTags = data;
         
        });
    
    
    
    
    }; 






 $scope.transfer = function () {
           
           
            var party1= $('#party1').val();
            var party2= $('#party2').val();
            var fromdate= $('#from-date').val();
            var fromto= $('#to-date').val();
            var enteramount= $('#amount').val();
            var notes= $('#notes_r').val();
             
              
              
            
       
           if(party1!='' && party2!='')  
           {
               
               
           
            
           if(enteramount>0)
           {
               
           

           $scope.saveTransfer(party1,party2,fromdate,fromto,enteramount,notes);
           $scope.saveTransfer1(party2,party1,fromdate,fromto,enteramount,notes);
           
           }
           else
           {
               alert('Enter The amount');
           }
                
                
           }
           else
           {
               alert('Select The Bank Accounts');
           }            
                
                
           
           


};



$scope.saveTransfer = function(party1,party2,fromdate,fromto,enteramount,notes){
 var create_date= $('#create_date').val();
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/save_to_pay_transfer",
                        data:{'notes':notes,'enteramount':enteramount,'bank1':party1,'bank2':party2,'create_date':create_date,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                         
                    
                        });

};



$scope.saveTransfer1 = function(party1,party2,fromdate,fromto,enteramount,notes){
 var create_date= $('#create_date').val();
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/save_to_pay_transfer1",
                        data:{'notes':notes,'enteramount':enteramount,'bank1':party1,'bank2':party2,'create_date':create_date,'account_head_id':$scope.account_head_id}
                        }).success(function(data){
                          
                          
                           $scope.fetchDatadetails(data.id,fromdate,fromto);
   
                           $('#firstmodalcommisonparty').modal('toggle');
                    
                        });

};


$scope.bankstatementupdate = function(){


                         var changecustomer=  $('#changecustomer').val();
                         
                         if(changecustomer=='')
                         {
                             var changecustomer=0
                         }
                         
                        $http({
                        method:"POST",
                        url:"<?php echo base_url() ?>index.php/bankdeposit/updatebankset",
                        data:{'bank_account_id':$scope.bankname,'changecustomer':changecustomer,'account_head_id':$scope.account_head_id,'ex_code':$scope.ex_code,'id':$scope.hidden_id,'debit':$scope.debit,'credit':$scope.credit,'status_by':$scope.status_by,'name':$scope.name,'create_date':new Date($scope.create_date)}
                        }).success(function(data){
                          
                          
                          
                                  $('#editdata').modal('toggle');
                                var fromdate= $('#from-date').val();
                                var fromto= $('#to-date').val();
                                var userid= $('#choices-single-default').val();
                                $scope.fetchDatadetails(userid,fromdate,fromto);
                                
                                
                    
                        });

};




$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
        
     
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/bankaccount/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'bankaccount_manage'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        
        var fromdate= $('#from-date').val();
        var fromto= $('#to-date').val();
        var userid= $('#choices-single-default').val();
        $scope.fetchDatadetails(userid,fromdate,fromto);
        
        
        
      }); 
    }
};




 $scope.editData = function(id){
     
     $('#debit_data').show();
     $('#credit_data').show();
    $http({
      method:"POST",
      url:"<?php echo base_url(); ?>index.php/bankaccount/fetch_single_data_by",
      data:{'id':id, 'action':'fetch_single_data','tablename':'bankaccount_manage'}
    }).success(function(data){
       $scope.name = data.name; 
       $scope.ex_code = data.ex_code; 
       
       
       
       $scope.bankname = data.bank_account_id; 
       $scope.account_head_id = data.account_head_id;
      
      
       $scope.debit = data.debit; 
       
       
       if(data.debit=='0')
       {
           //$('#debit_data').hide();
       }
       
       if(data.credit=='0')
       {
           //$('#credit_data').hide();
       }
       
       $scope.credit = data.credit; 
       
       
       $scope.create_date = new Date(data.create_date); 
       $scope.status_by = data.status_by; 
       
      $scope.hidden_id = data.id;
      $scope.submit_button = 'Update';
     
    });
    
       $('#editdata').modal('toggle');
    
};              















 $scope.fetchDatadetails = function(id,fromdate,fromto){
     
      var fromdate= $('#from-date').val();
    var fromto= $('#to-date').val();
     
       $scope.loading = true;

    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details?deleteid=0&account_id='+id+'&fromdate='+fromdate+'&fromto='+fromto).success(function(data){
     
     
      $scope.query = {}
      $scope.queryBy = '$';
      
      $scope.loading = false;

     
     
     $scope.namesDatadetails = data;
     
     
               
       
       
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debit = parseFloat(data[i].debit,2);
                    amounttotaldebits += debit;
                }
                
                
               
                
                 var totalvaldebit=amounttotaldebits;
                 
                  $scope.amounttotaldebits =totalvaldebit.toFixed(2);
                
                $("#d_tot").text(totalvaldebit.toFixed(2));
               
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credit = parseFloat(data[i].credit,2);
                  
                    amounttotalcredits += credit;
                }
                
                
                
                
                  
                  
                  
                 var totalvalcredits=amounttotalcredits;
                 
                 $scope.amounttotalcredits =totalvalcredits.toFixed(2);
                
                
                 $("#c_tot").text(totalvalcredits.toFixed(2));
               
                var totalval=amounttotalcredits-amounttotaldebits;
                $scope.totalblancedatefilter=totalval.toFixed(2);
                   
                   
                   
      
    });
  };
  
  
  
  
 




$scope.fetchDatadetailsTotal = function(id,fromdate,todate)
{
     
     
      var fromdate= $('#from-date').val();
    var todate= $('#to-date').val();
      

       $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details_total?account_id='+id+'&fromdate='+fromdate+'&fromto='+todate).success(function(data){
     

     
     
                $scope.getstatus=data.getstatus;
                 $scope.cgetstatus=data.cgetstatus;
                $scope.totalbalance=data.totalbalance;
                $scope.totalbalancec=data.totalbalancec;
                $scope.totalbalanced=data.totalbalanced;


                 $scope.ctotalbalance=data.ctotalbalance;

                 $scope.totals_opeing=data.totals_opeing;
                 $scope.opstatus=data.opstatus;
              
       
               
                   
      
    });
  };

  














 $scope.fetchDatadetailsopeingbalance = function(id,fromdate,fromto){
    $http.get('<?php echo base_url() ?>index.php/bankaccount/fetch_data_details_by_opeing_balance?account_id='+id+'&fromdate='+fromdate+'&fromto='+fromto).success(function(data){
     
     
     
     $scope.namesDatadetailsval = data;
      
                var amounttotaldebits = 0;
                for(var i = 0; i < data.length; i++){
                    var debit = parseFloat(data[i].debit,2);
                    amounttotaldebits += debit;
                }
                
             
             
               
               
                var amounttotalcredits = 0;
                for(var i = 0; i < data.length; i++){
                    var credit = parseFloat(data[i].credit,2);
                  
                    amounttotalcredits += credit;
                }
                
            
       var totalval=amounttotalcredits-amounttotaldebits;
       $scope.totalblanceopeing=totalval.toFixed(2);
      
    });
  };
 















});

</script>
    <?php include ('footer.php'); ?>
</body>



