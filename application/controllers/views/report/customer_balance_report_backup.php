<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
.loading {
    text-align: center;
}
.trpoint:hover {
    background: antiquewhite;
}
.setload {
    background: #fff1e7;
}
.card-header {
    display: block;
    text-align: center;
    border-bottom:none;
}

b.ng-binding.ng-scope {
    font-size: 11px;
}
.table-responsive {
    height: 500px;
    cursor: all-scroll;
}
b.ng-binding {
    font-size: 11px;
}
td a {
    color: black;
}

.shownullvalue{
    display:none;
}

.choices__inner {
     padding: 0px 9px;
    
    }
    .choices__input {
   
     background-color: #fff;
    
    
    }
    .choices__list--multiple .choices__item {
    display: inline-block;
    vertical-align: middle;
    border-radius: 20px;
    padding: 3px 8px;
    font-size: 12px;
    font-weight: 500;
    margin-right: 3.75px;
    margin-bottom: -2.25px;
    background-color: #00bcd4;
    border: 1px solid #fff;
    color: #fff;
    word-break: break-all;
    box-sizing: border-box;
}
.checkdata_1_hide,.checkdata_2_hide,.checkdata_3_hide,.checkdata_4_hide,.checkdata_5_hide,.checkdata_6_hide,.checkdata_7_hide,.checkdata_8_hide,.checkdata_9_hide,.checkdata_10_hide,.checkdata_11_hide,.checkdata_12_hide,.checkdata_13_hide
{
     display: none;
}

</style>




<?php

 $checked1="checked";
  $checked2="checked";
   $checked3="checked";
    $checked4="checked";
     $checked5="checked";
      $checked6="checked";
       $checked7="checked";
        $checked8="checked";
         $checked9="checked";
         $checked10="checked";
          $checked11="checked";
           $checked12="checked";
            $checked13="checked";
 
 $checkdata_1_hide="";
 $checkdata_2_hide="";
 $checkdata_3_hide="";
 $checkdata_4_hide="";
 $checkdata_5_hide="";
 $checkdata_6_hide="";
 $checkdata_7_hide="";
 $checkdata_8_hide="";
 $checkdata_9_hide="";
 $checkdata_10_hide="";
 $checkdata_11_hide="";
 $checkdata_12_hide="";
 $checkdata_13_hide="";
 
if(count($table_customize)>0)
{
   
   
   foreach($table_customize as $vl)
   {
       
       $label_id=$vl->label_id;
       $status=$vl->status;
       
       
       if($label_id==1)
       {
           if($status==0)
           {
               $checkdata_1_hide="checkdata_1_hide";
               $checked1="";
           }
       }
       
       if($label_id==2)
       {
           if($status==0)
           {
               $checkdata_2_hide="checkdata_2_hide";
                $checked2="";
           }
       }
       
       if($label_id==3)
       {
           if($status==0)
           {
               $checkdata_3_hide="checkdata_3_hide";
                $checked3="";
           }
       }
       
       if($label_id==4)
       {
           if($status==0)
           {
               $checkdata_4_hide="checkdata_4_hide";
                $checked4="";
           }
       }
       
       if($label_id==5)
       {
           if($status==0)
           {
               $checkdata_5_hide="checkdata_5_hide";
                $checked5="";
           }
       }
       
       if($label_id==6)
       {
           if($status==0)
           {
               $checkdata_6_hide="checkdata_6_hide";
                $checked6="";
           }
       }
       
       if($label_id==7)
       {
           if($status==0)
           {
               $checkdata_7_hide="checkdata_7_hide";
                $checked7="";
           }
       }
       
       if($label_id==8)
       {
           if($status==0)
           {
               $checkdata_8_hide="checkdata_8_hide";
                $checked8="";
           }
       }
       
       if($label_id==9)
       {
           if($status==0)
           {
               $checkdata_9_hide="checkdata_9_hide";
                $checked9="";
           }
       }
       
       if($label_id==10)
       {
           if($status==0)
           {
               $checkdata_10_hide="checkdata_10_hide";
                $checked10="";
           }
       }
       
       if($label_id==11)
       {
           if($status==0)
           {
               $checkdata_11_hide="checkdata_11_hide";
                $checked11="";
           }
       }
       
       if($label_id==12)
       {
           if($status==0)
           {
               $checkdata_12_hide="checkdata_12_hide";
                $checked12="";
           }
       }
       
       if($label_id==13)
       {
           if($status==0)
           {
               $checkdata_13_hide="checkdata_13_hide";
                $checked13="";
           }
       }
       
      
       
     
       
       
   }
   
    
}



?>




<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>






 <?php
 $customer_id=0;
 if(isset($_GET['customer_id']))
 {
     $customer_id=$_GET['customer_id'];
 }
 
 ?>









 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Customer Balance Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer Balance Report !</li>
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
                                
                            <div class="col" > <!--data-trigger -->
                              <select class="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                            <option value="ALL">All Sales Team</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                             <div class="col">
                              <select class="form-control" id="sales_group" ng-model="sales_group" ng-change="salesgroupChanged()">
                                                            <option value="ALL">All Sales Group</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_group as $vals)
                                                            {
                                                                ?>
                                                                 <option  value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                         </div>
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date" value="<?php echo date('Y-04-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date" value="<?php echo $this->session->userdata['logged_in']['to_date']; ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                             
                             
                             </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Customer Balance Report {{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                   
                   <div id="search-view1"  >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                      
                                           <h4 class="card-title">Customer Balance Report <?php echo date('Y-04-01'); ?> To <?php echo $this->session->userdata['logged_in']['to_date']; ?></h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                
                      <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-4" style="display:none;">
                            <div class="dataTables_length" id="example_length">
                             
                                                             <input type="hidden" id="nextnumber" value="0">   
                                                            <input type="hidden" id="prenumber" value="1">  
                                                            <input type="hidden" id="pageSize" value="1">  
                                <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                    <option value=""> Group Length</option>
                                    <option value="1">1</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                    <option value="20"> 12 and above</option>
                                </select> 
                            </div>
                         </div>
                         
                        
                         
                         <div class="col-sm-12">
                             
                              <label for="showhiddenrow" style="float: right;margin: 9px 9px;">
                                  <input type="checkbox" id="showhiddenrow" checked>
                                  Hide / Show Null Balance
                              </label>
                              <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger  waves-effect waves-light" style="float: right;">Customize table</button>
                           
                        <div id="example_filter" class="dataTables_filter">
                        <input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search By Customer" ng-model="searchText" ng-change="searchTextChanged()">
                        </div>
                    </div>
                       </div>
                   
                  
                  
                  <div class="table-responsive">
                      
   


                   
                   <table id="datatable" style="position: relative;" class="table table-bordered"  ng-init="fetchDatagetlegderGroup(0)" >
                           <thead style="background: #fff;">
                        
                       </thead>
                   
                        <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th>No</th>
                          <th style="width:400px;">Customer_Name</th>
                          <th style="width:400px;">Customer_phone</th>
                          <th style="width:250px;">Area</th>
                          <th style="width:300px;" class="checkdata_1 <?php echo $checkdata_1_hide; ?>">Open Dr </th>
                          <th style="width:300px;" class="checkdata_2 <?php echo $checkdata_2_hide; ?>">Open Cr </th>
                          <th style="width:300px;" class="checkdata_3 <?php echo $checkdata_3_hide; ?>">Open_Bal </th>
                          <th style="width:300px;" class="checkdata_4 <?php echo $checkdata_4_hide; ?>">Tran Dr</th>
                          <th style="width:300px;" class="checkdata_5 <?php echo $checkdata_5_hide; ?>">Tot Dr</th>
                          <th style="width:300px;" class="checkdata_6 <?php echo $checkdata_6_hide; ?>">Tran Cr</th>
                          <th style="width:300px;" class="checkdata_7 <?php echo $checkdata_7_hide; ?>">Tot Cr</th>
                          <th style="width:300px;" class="checkdata_8 <?php echo $checkdata_8_hide; ?>">Debit</th>
                          <th style="width:300px;" class="checkdata_9 <?php echo $checkdata_9_hide; ?>">Credit</th>
                          <th style="width:300px;" class="checkdata_10 <?php echo $checkdata_10_hide; ?>">Closing</th>
                          <th style="width:300px;" class="checkdata_11 <?php echo $checkdata_11_hide; ?>">Sheet_in_Factory</th>
                          <th style="width:300px;" class="checkdata_12 <?php echo $checkdata_12_hide; ?>">Transit</th>
                          <th style="width:300px;" class="checkdata_13 <?php echo $checkdata_13_hide; ?>">Net_Balance</th>
                          <!--<th >Remarks</th>
                          <th >Phone No</th>-->
                         
                        </tr>
                     
                      
                      <tr class="setload " >
                          
                           <td></td>
                           <td></td>
                           <td></td>
                          <td></td>
                          <td class="checkdata_1 <?php echo $checkdata_1_hide; ?>"></td>
                            <td class="checkdata_2 <?php echo $checkdata_2_hide; ?>"></td>
                              <td class="checkdata_3 <?php echo $checkdata_3_hide; ?>"></td>  
                              <td class="checkdata_4 <?php echo $checkdata_4_hide; ?>"></td> 
                              <td class="checkdata_5 <?php echo $checkdata_5_hide; ?>"></td>
                                <td class="checkdata_6 "><loading></loading></td>
                                  <td class="checkdata_7 <?php echo $checkdata_7_hide; ?>"></td>
                                    <td class="checkdata_8 <?php echo $checkdata_8_hide; ?>"></td>
                                    
                                    
                                      <td class="checkdata_9 <?php echo $checkdata_9_hide; ?>"></td>
                                        <td class="checkdata_10 <?php echo $checkdata_10_hide; ?>"></td>
                                          <td class="checkdata_11 <?php echo $checkdata_11_hide; ?>"></td>
                                          
                                            <td class="checkdata_12 <?php echo $checkdata_12_hide; ?>"></td>
                                              <td class="checkdata_13 <?php echo $checkdata_13_hide; ?>"></td>
                                                
                                  
                            
                         
                      
                      </tr>
                             
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                            
                            
                            <tr  class="trpoint " style="background: #fff1e7;">
                          
                           <td>{{names.no}}</td>
                           
                          <td><b style="color:#ff5e14;"> {{names.sales_group_name}}</b></td>
                          <td></td>
                          <td></td>
                          <td class="checkdata_1 <?php echo $checkdata_1_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Dr!=0">{{names.Open_Dr | number}}</b></td>
                          <td class="checkdata_2 <?php echo $checkdata_2_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Cr!=0">{{names.Open_Cr | number}}</b></td>
                          <td class="checkdata_3 <?php echo $checkdata_3_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Bal!=0">{{names.Open_Bal | number}}</b></td>  
                          <td class="checkdata_4 <?php echo $checkdata_4_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tran_Dr!=0">{{names.Tran_Dr | number}}</b></td> 
                          <td class="checkdata_5 <?php echo $checkdata_5_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tot_Dr!=0">{{names.Tot_Dr | number}}</b></td>
                          <td class="checkdata_6 <?php echo $checkdata_6_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tran_Cr!=0">{{names.Tran_Cr | number}}</b></td>
                          <td class="checkdata_7 <?php echo $checkdata_7_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tot_Cr!=0">{{names.Tot_Cr | number}}</b></td>
                          <td class="checkdata_8 <?php echo $checkdata_8_hide; ?>"><b style="color:#ff5e14;" ng-if="names.debit!=0">{{names.debit | number}}</b></td>
                          <td class="checkdata_9 <?php echo $checkdata_9_hide; ?>"><b style="color:#ff5e14;" ng-if="names.credit!=0">{{names.credit | number}}</b></td>
                          <td class="checkdata_10 <?php echo $checkdata_10_hide; ?>"><b style="color:#ff5e14;" ng-if="names.closeing!=0">{{names.closeing | number}}</b></td>
                          <td class="checkdata_11 <?php echo $checkdata_11_hide; ?>"><b style="color:#ff5e14;" ng-if="names.sheet_in_factory!=0">{{names.sheet_in_factory | number}}</b></td>
                          <td class="checkdata_12 <?php echo $checkdata_12_hide; ?>"><b style="color:#ff5e14;" ng-if="names.transit!=0">{{names.transit | number}}</b></td>
                          <td class="checkdata_13 <?php echo $checkdata_13_hide; ?>"><b style="color:#ff5e14;" ng-if="names.net_balance!=0"></b></td>
                          </tr>
                            
                            <tr class="trpoint_make {{ namesvv.hidestatus }}" ng-repeat="namesvv in names.subarray">
                           
                           <td></td>
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.customername}}</a></td>
                          <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.customerphone}}</a></td>
                          
                          
                          
                           <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.route_name}}</a></td>
                          
                          <td class="checkdata_1 <?php echo $checkdata_1_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.opening_balance_dr!=0">{{namesvv.opening_balance_dr | number}} </b> </a></td>
                          <td class="checkdata_2 <?php echo $checkdata_2_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.opening_balance_cr!=0">{{namesvv.opening_balance_cr | number}} </b> </a></td>
                          <td class="checkdata_3 <?php echo $checkdata_3_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.opening_balance!=0">{{namesvv.opening_balance | number}}  {{ namesvv.payment_status}}</b> </a></td>
                          
                          
                          <td class="checkdata_4 <?php echo $checkdata_4_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.trnDr!=0">{{namesvv.trnDr | number}}  </b> </a></td>
                          <td class="checkdata_5 <?php echo $checkdata_5_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.trnDrtotal!=0">{{namesvv.trnDrtotal | number}}  </b> </a></td>
                          <td class="checkdata_6 <?php echo $checkdata_6_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.trnCr!=0">{{namesvv.trnCr | number}}  </b> </a></td>
                          <td class="checkdata_7 <?php echo $checkdata_7_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.trnCrtotal!=0">{{namesvv.trnCrtotal | number}}  </b> </a></td>
                          
                          
                          
                          
                           <td class="checkdata_8 <?php echo $checkdata_8_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.debit!=0">{{namesvv.debit | number}}</b></a></td>
                           <td class="checkdata_9 <?php echo $checkdata_9_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.credit!=0">{{namesvv.credit | number}}</b></a></td>
                           
                           
                           <td class="checkdata_10 <?php echo $checkdata_10_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.closeing!=0">{{namesvv.closeing | number}} {{namesvv.payment_status_bu_closeing}}</b></a></td>
                           
                           
                           
                           <td class="checkdata_11 <?php echo $checkdata_11_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.sheet_in_factory!=0">{{namesvv.sheet_in_factory | number}}</b></a></td>
                           <td class="checkdata_12 <?php echo $checkdata_12_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.transit!=0">{{namesvv.transit | number}}</b></a></td>
                           <td class="checkdata_13 <?php echo $checkdata_13_hide; ?>"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b ng-if="namesvv.balance!=0">
                               
                               <span ng-if="namesvv.getstatus==0" style="color:red;">{{namesvv.balance | number}}</span>
                               <span ng-if="namesvv.getstatus==1" style="color:green;"></span>
                               
                               </b></a></td>
                          
                          
                          <!--<td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b >{{namesvv.feedback_details}}</b></a></td>
                          <td><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank"><b >{{namesvv.phone}}</b></a></td>
                          -->
                          
                          
                       </tr>
                        
                        
                        
                      
                      </tbody>
                      
                        <!--  <tr  class="trpoint">
                          
                           <td></td>
                           <td></td>
                           <td>{{totalopening_balance | number}}</td>
                           <td>{{totaldebit | number}}</td>
                           <td>{{totalcredit | number}}</td>
                           <td>{{totalsheet_in_factory | number}}</td>
                           <td>{{totaltransit | number}}</td>
                           <td>{{totalbalance  | number}}</td>
                          
                        </tr>-->
                      
                      
                    </table>
              
                   
                   
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
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Customize table</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          
                                                          
                                                          <table class="table">
                                                              
                                                          
                                                             <tr>


                         
                          <td >
     <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck" value="1" <?php echo $checked1; ?> type="checkbox" id="flexSwitchCheckDefault1">
          <label class="form-check-label" for="flexSwitchCheckDefault1"> Open Dr </label>
        </div> </td>
                          <td >  <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="2" <?php echo $checked2; ?> type="checkbox" id="flexSwitchCheckDefault2">
          <label class="form-check-label" for="flexSwitchCheckDefault2"> Open Cr  </label>
        </div> </td>
                          <td > 
                          
                          <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="3" <?php echo $checked3; ?> type="checkbox" id="flexSwitchCheckDefault3">
          <label class="form-check-label" for="flexSwitchCheckDefault3">Open Bal</label>
        </div>
                          </td>
                          
                          </tr>
                          
                          
                          
                          
                          
                          <tr>
                              
                              <td >
                          
                                 <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="4" <?php echo $checked4; ?> type="checkbox" id="flexSwitchCheckDefault4">
          <label class="form-check-label" for="flexSwitchCheckDefault4"> Tran Dr </label>
        </div>
                          </td>
                              
                              
                          <td >
                          
                           <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="5" <?php echo $checked5; ?> type="checkbox" id="flexSwitchCheckDefault5">
          <label class="form-check-label" for="flexSwitchCheckDefault5">Tot Dr</label>
        </div>
                          
                          </td>
                          <td >
                                    <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="6" <?php echo $checked6; ?> type="checkbox" id="flexSwitchCheckDefault6">
          <label class="form-check-label" for="flexSwitchCheckDefault6">Tran Cr</label>
        </div>
                          
                              
                              </td>
                         
                              
                              
                              </tr>
                              <tr>
                                  
                                  
                                  
                                  
                                  
                                  
                                   <td >
                              
                               <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="7" <?php echo $checked7; ?> type="checkbox" id="flexSwitchCheckDefault7">
          <label class="form-check-label" for="flexSwitchCheckDefault7">Tot Cr</label>
        </div>
                              
                              
                              
                              </td>
                              
                                 <td >
                              
                                               
                               <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="8" <?php echo $checked8; ?> type="checkbox" id="flexSwitchCheckDefault8">
          <label class="form-check-label" for="flexSwitchCheckDefault8">Debit</label>
        </div>
                  
                              
                              
                              
                              </td>
                                  
                                  
                                  
                       
                          <td >
                                        <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="9" <?php echo $checked9; ?> type="checkbox" id="flexSwitchCheckDefault9">
          <label class="form-check-label" for="flexSwitchCheckDefault9">Credit</label>
        </div>
                  
                              
                              
                              </td>
                              
                       
                       
                       
                         
                        </tr>
                        
                        
                        <tr>
                            
                                   
                              
                          <td >
                              
                                 <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="10" <?php echo $checked10; ?> type="checkbox" id="flexSwitchCheckDefault10">
          <label class="form-check-label" for="flexSwitchCheckDefault10">Closing</label>
        </div>
                  
                              
                              </td>
                          <td >
                              
                                <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="11" <?php echo $checked11; ?> type="checkbox" id="flexSwitchCheckDefault11">
          <label class="form-check-label" for="flexSwitchCheckDefault11">Sheet in Factory</label>
        </div>
                  
                              
                              
                              
                              </td>
                          <td >
                              
                              <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="12" <?php echo $checked12; ?> type="checkbox" id="flexSwitchCheckDefault12">
          <label class="form-check-label" for="flexSwitchCheckDefault12">Transit</label>
        </div>
                              
                              
                              
                              
                              </td>
                            
                               
                        </tr>
                        <tr>
                          <td>
                               <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="13" <?php echo $checked13; ?> type="checkbox" id="flexSwitchCheckDefault13">
          <label class="form-check-label" for="flexSwitchCheckDefault13">Net Balance</label>
        </div>
                              
                              </td>
                        </tr>
                        
                        </table>  
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>




<script>


const slider = document.querySelector('.table-responsive');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
  console.log(walk);
});


$(document).ready(function(){
 
  $('#payment_mode_payoff').on('change',function(){
      
      var val=$(this).val();
      
      if(val=='Cash')
      {
          $('#res_no').hide();
      }
      else
      {
          $('#res_no').show();
      }
      
  });
  
   $('#showhiddenrow').on('click',function(){
      
      if ($(this).is(':checked')) {
        
       
        $('.getview').addClass('shownullvalue');
        
      } else {
        
        $('.getview').removeClass('shownullvalue');
        
      }
      
  });
  
   $(".Uncheck").on('click',function(){
      
      
      var val=$(this).val();
      if($(this).is(':checked'))
      {
          $('.checkdata_'+val).show();
          var status=1;
      }
      else
      {
           $('.checkdata_'+val).hide();
           var status=0;
      }
      
      $.ajax({
      url: '<?php echo base_url() ?>index.php/report/table_customize',
      type: "get", //send it through get method
      data: { 
        status_id: status, 
        status_val: val
      }
    });
      
      
      
  });
  
$('#exportdata').on('click', function() {
  
      var payment_mode=1;
      var cateid= $('#choices-single-default').val();
      var customer_id= '<?php echo $customer_id;  ?>';
      var productid= 1;
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= 1;
      
      var sales_group= $('#sales_group').val();
      var payment_mode= $('#payment_mode').val();
      url = '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_export?limit=10&customer_id='+customer_id+'&cate_id='+cateid+'&sales_group='+sales_group+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode;
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
  $scope.getproductval = 'ALL';
$scope.sales_group = 'ALL';

   $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 1;
    $scope.searchText = '';

$scope.pageSizeChanged = function() {
        
       
        $scope.fetchDatagetlegderGroup();
        
}

$scope.salesgroupChanged = function() {
      
        $scope.fetchDatagetlegderGroup();
}
   

$scope.search = function(){
    
       $scope.currentPage = 1;
       
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
       
      $scope.formdate = fromdate;
      $scope.todate = fromto;
   
      $('#search-view').show();
      $('#search-view1').hide();
      $('#exportdata').show();
      
      $scope.fetchDatagetlegderGroup();
    
    
    
};

 $scope.searchTextChanged = function() {
      
        $scope.fetchDatagetlegderGroup();
 }
    
    

$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

$scope.fetchDatagetlegderGroup = function(){
    
       $scope.loading = true;
 var customer_id= '<?php echo $customer_id;  ?>';
      var order_status=1;
      var payment_mode=1;
      var productid=1
      var cateid= $('#choices-single-default').val();
      var productid= 1;
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
       var sales_group= $('#sales_group').val();
    
      $http.get('<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report?limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group='+sales_group+'&order_status='+cateid+'&payment_mode='+payment_mode).success(function(data)
      {
   
               $scope.namesDataledgergroup = data;
                $scope.loading = false;
      
      
     });
    
    
  };
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



