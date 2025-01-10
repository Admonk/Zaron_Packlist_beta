<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
}
#balance_view
{
  color: blue;
}
.getview {
    background: #ffe998;
}
.primary,.secondchild{
  width: 100%;
    display: contents;
}
.chriedchild
{
    width: 100%;
    display: contents;
}
.page-title-box {
    padding-bottom: 8px;
}
.sales_name {
    font-size: 15px !important;
  
    color: #9b1d1d;
}
.card-body {
    padding: 10px 8px;
}
    #resp-table {
        width: 100%;
        display: table;
    }
    #resp-table-body{
        display: table-row-group;
        font-size: 8px;
    }
    .resp-table-row{
        display: table-row;
    }
    .table-body-cell{
        display: table-cell;
        border: 1px solid #f1f1f1;
        padding: 0px 0.5px;
        line-height: 2.428571;
        vertical-align: middle;
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
    font-size: 10px;
padding: 5px;
}
.table-responsive {
    height: 500px;
    
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
.checkdata_1_hide,.checkdata_2_hide,.checkdata_3_hide,.checkdata_4_hide,.checkdata_5_hide,.checkdata_6_hide,.checkdata_7_hide,.checkdata_8_hide,.checkdata_9_hide,.checkdata_10_hide,.checkdata_11_hide,.checkdata_12_hide,.checkdata_13_hide,.checkdata_14_hide
{
     display: none;
}


.some-class1 {
    margin: 0 50%;
}
.trpoint {
    
    cursor: pointer;
   
}
.table>tbody {
    vertical-align: middle;
}
.trpoint:hover {
    background: antiquewhite;
}

         .loading {
    text-align: center;
}

td {
    font-size: 11px;
    color: black;
}
td a {
    color: black;
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
   
}
.bgcolorchange {
    background: #ededed;
}


[ng-click]{
  cursor: pointer !important;
}

</style>




<?php

$testMode = (isset($_GET['test']) && $_GET['test']);

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
            
            $checked120="checked";
            
 $checked14="checked";
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
  $checkdata_14_hide="";
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
       
      
       
       if($label_id==14)
       {
           if($status==0)
           {
                $checkdata_14_hide="checkdata_14_hide";
                $checked14="";
           }
       }
       
        if($label_id==120)
       {
           if($status==0)
           {
                $checkdata_120_hide="checkdata_14_hide";
                $checked120="";
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

  $sales_group_id='ALL';
 if(isset($_GET['sales_group_id']))
 {
     $sales_group_id=$_GET['sales_group_id'];
 }


 $sales_team_id='ALL';
 if(isset($_GET['sales_team_id']))
 {
     $sales_team_id=$_GET['sales_team_id'];
 }
 
  $cus_date=date('Y-m-d');
 if(isset($_GET['forDate']))
 {
     $cus_date= date('Y-m-d', strtotime($_GET['forDate']));

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
                                                            
                                                            
                                                          <?php
                                                                 if($this->session->userdata['logged_in']['access']!='12')
                                                                 {
                                                                     
                                                                     ?>
                                                                      <option value="ALL">All Sales Team</option>
                                                                     <?php
                                                                     
                                                                 }
                                                            ?>
                                                            
                                                            <?php
                                                            
                                                            foreach($customers as $val)
                                                            {
                                                                
                                                                 if($val->status==1)
                                                                {
                                                                    
                                                                
                                                                         if($this->session->userdata['logged_in']['access']=='12')
                                                                         {
                                                                             if($this->session->userdata['logged_in']['userid']==$val->id)
                                                                             {
                                                                                
                                                                             ?>
                                                                             
                                                                             <option   value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option <?= $val->id == $sales_team_id ? 'selected' : '' ?>  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
                                                                             <?php
                                                                         }
                                                                         
                                                                 
                                                                }
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                            </div>
                            
                             <div class="col">
                              <select class="form-control" id="sales_group"  >
                                                            <option value="ALL">All Sales Group</option>
                                                            
                                                            <?php
                                                            
                                                            foreach($sales_group as $vals)
                                                            {
                                                                ?>
                                                                 <option <?= $vals->id == $sales_group_id ? 'selected' : '' ?> value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                         </div>
                            
                            <div class="col">
                              <input type="date" class="form-control" id="from-date"  min="<?php echo date('2024-01-01'); ?>" value="<?php echo $cus_date; ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" id="to-date"  min="<?php echo date('2024-01-01'); ?>" value="<?php echo $cus_date; ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <!-- <button type="button"  class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button> -->
                             
                             
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
                                      
                                           <h4 class="card-title">Customer Balance Report <?php echo date('2024-01-01',strtotime("-1 year")); ?> To <?php echo $this->session->userdata['logged_in']['to_date']; ?></h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                
                      <div class="row" style="margin-bottom: 10px;">                                    
                            <div class="col-sm-4" style="display:none;">
                            <div class="dataTables_length" id="example_length">

                                <input type="hidden" id="net_balance" > 
                                <input type="hidden" id="net_balance_status" >
                             
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
                                  <input type="checkbox" id="showhiddenrow" <?php echo $checked120; ?>>
                                  Show null balance
                              </label>
                              <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger  waves-effect waves-light" style="float: right;">Customize table</button>
                           
                        <div id="example_filter" class="dataTables_filter">
                        <input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search By Customer" ng-model="searchText" ng-change="searchTextChanged()">
                       
                       
                        <!--<input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search By Customer" ng-model="query[queryBy]">-->
                        </div>
                    </div>
                       </div>
                   
                  
                  
                  <div class="table-responsive">
                      
   

<div id="resp-table">
    <div id="resp-table-body" style="position: relative;">
        <div class="resp-table-row" style="position: sticky;top: 0;background: #dfdfdf;" class="table table-bordered"  ng-init="fetchDatagetlegderGroup(0,0)"> 
           
            
                          <div class="table-body-cell">No</div>
                          <div  class="table-body-cell" style="width: 150px;">Customer_Name</div>
                          <div  class="table-body-cell">Customer_phone</div>
                          <div  class="table-body-cell" style="width: 150px;">Area</div>
                          <div  class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>">Open_Dr </div>
                          <div  class="table-body-cell checkdata_2 <?php echo $checkdata_2_hide; ?>">Open_Cr </div>
                          <div  class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>">Open_Bal </div>
                          <div  class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>">Tran_Dr</div>
                          <div  class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>">Tot_Dr</div>
                          <div  class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>">Tran_Cr</div>
                          <div  class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>">Tot_Cr</div>
                          <div  class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>">Debit</div>
                          <div  class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>">Credit</div>
                          <div  class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>">Closing</div>
                          <div  class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">In Production Return</div>
                          <div  class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">In Production</div>
                          <div  class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>">Sheet_in_Factory</div>
                          <div  class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>">Transit</div>
                          <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">Net_Balance</div>
                          <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">Sheet</div> 
                          <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">Action</div>
                          
            
        </div>
        
        
       <div class="resp-table-row setload"> 
                          
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                    <div class="table-body-cell"></div>
                                  <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_2 "> <loading></loading></div>
                                  <div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>"></div>  
                                  <div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>"> </div> 
                                  <div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>"></div>
                                   <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>"></div>
                                  <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"></div>
                                   <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"></div>     
                                  <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"></div>     
                                                         
                                        
                                    
                                 
        </div>
          <div class="resp-table-row " style="background: #fff1e7;font-weight: bold;font-size: larger"> 
                            <div class="table-body-cell"><b>Totals</b></div>
                          <div class="table-body-cell"><b class="sales_name"> </b></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>"></div>
                          <div class="table-body-cell checkdata_2 <?php echo $checkdata_2_hide; ?>"></div>
                          <div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>"></div>
                          <div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>"></div>
                          <div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>"></div>
                          <div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>"></div>
                          <div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>"></div>
                          <div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>"><b>{{debit | number}}</b></div>
                          <div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>">{{credit | number}}</div>
                          <div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>">{{closeing | number}}</div>
                          <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">{{production_return | number}}</div>
                          <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>">{{production | number}}</div>
                          <div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>">{{sheet_in_factory | number}}</div>
                          <div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>">{{transit | number}}</div>
                          <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">{{net_balance | number}}</div>
                          <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">{{sheet_total | number}}</div>
                          <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"> </div>


                        
                                        
                                    
                                 
        </div>
        
        
        <div class="primary" ng-repeat="names in namesDataledgergroup">
        
         <div class="resp-table-row trpoint" style="background: #fff1e7;"  >
                          
                           <div class="table-body-cell">{{names.no}}</div>
                           
                          <div class="table-body-cell"><b style="color:#ff5e14;"> {{names.sales_group_name}}</b></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Dr!=0">{{names.Open_Dr | number}}</b></div>
                          <div class="table-body-cell checkdata_2 <?php echo $checkdata_2_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Cr!=0">{{names.Open_Cr | number}}</b></div>
                          <div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Open_Bal!=0">{{names.Open_Bal | number}}</b></div>  
                          <div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tran_Dr!=0">{{names.Tran_Dr | number}}</b></div> 
                          <div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tot_Dr!=0">{{names.Tot_Dr | number}}</b></div>
                          <div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tran_Cr!=0">{{names.Tran_Cr | number}}</b></div>
                          <div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>"><b style="color:#ff5e14;" ng-if="names.Tot_Cr!=0">{{names.Tot_Cr | number}}</b></div>
                          <div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>"><b style="color:#ff5e14;" ng-if="names.debit!=0">{{names.debit | number}}</b></div>
                          <div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>"><b style="color:#ff5e14;" ng-if="names.credit!=0">{{names.credit | number}}</b></div>
                          <div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>"><b style="color:#ff5e14;" ng-if="names.closeing!=0">{{names.closeing | number}}</b></div>
                          <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"><b style="color:#ff5e14;" ng-if="names.production_return!=0">{{names.production_return | number}}</b></div>
                         
                         <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"><b style="color:#ff5e14;" ng-if="names.production!=0">{{names.production | number}}</b></div>
                         
                          <div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>"><b style="color:#ff5e14;" ng-if="names.sheet_in_factory!=0">{{names.sheet_in_factory | number}}</b></div>
                          <div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>"><b style="color:#ff5e14;" ng-if="names.transit!=0">{{names.transit | number}}</b></div>
                          <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"><b style="color:#ff5e14;" ng-if="names.net_balance!=0">


                               <span  style="color:red;">{{names.net_balance | number}} </span>
                              
                            

                          </b></div>


                          <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"><b style="color:#ff5e14;" ng-if="names.sheet_total!=0">
                              {{names.sheet_total | number}}
                          </b></div>

                        <div  class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"></div>
                             
                          




         </div>
         
         
         <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
             
         
         <div class="resp-table-row" >
                          
                           
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"><b class="sales_name">{{namesvvssget.sales_person_name}}</b></div>
                          <div class="table-body-cell"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvvssget.sl_totals.id}}" target="_blank"> </a></div>
                          
                          
                          
                           <div class="table-body-cell table-body-cell"> </div>
                          
                  <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>"><b>{{namesvvssget.sl_totals.opening_balance_dr | number}}</b></div>
<div class="table-body-cell checkdata_2 <?php echo $checkdata_2_hide; ?>"><b>{{namesvvssget.sl_totals.opening_balance_cr | number}}</b></div>
<div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>"><b>{{namesvvssget.sl_totals.opening_balance | number}} </b></div>

<div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>"><b>{{namesvvssget.sl_totals.trnDr | number}}</b></div>
<div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>"><b>{{namesvvssget.sl_totals.trnDrtotal | number}}</b></div>
<div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>"><b>{{namesvvssget.sl_totals.trnCr | number}}</b></div>
<div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>"><b>{{namesvvssget.sl_totals.trnCrtotal | number}}</b></div>

<div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>"><b>{{namesvvssget.sl_totals.debit | number}}</b></div>
<div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>"><b>{{namesvvssget.sl_totals.credit | number}}</b></div>

<div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>"><b>{{namesvvssget.sl_totals.closeing | number}}  </b></div>

<div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"><b>{{namesvvssget.sl_totals.inproduction_total_return | number}}</b></div>

<div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"><b>{{namesvvssget.sl_totals.production | number}}</b></div>

<div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>"><b>{{namesvvssget.sl_totals.sheet_in_factory | number}}</b></div>
<div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>"><b>{{namesvvssget.sl_totals.transit | number}}</b></div>
                           <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"> <b ng-if="namesvvssget.sl_totals.balance!=0">
                               
                               <span   style="color:red;"><b>{{namesvvssget.sl_totals.balance | number}}</b></span>
                               
                               </b></div>


                             <div   class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>"> 
                               
                               <span  style="color:red;"><b>{{namesvvssget.sl_totals.sheet | number}}</b></span>
                              
                               
                              
                            </div>   


                              <div   class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">
 


                            </div>       
                     
                        
                         
                         
                        
         </div>
         
         
         
          <div class="chriedchild" ng-repeat="namesvv in namesvvssget.subarray | filter:query" >
              
              <div class="resp-table-row {{ namesvv.hidestatus }}" ng-if="namesvvssget.sales_team_id==namesvv.sales_team_id">
                           
                           <div class="table-body-cell">{{namesvv.no}}</div>
                           <div class="table-body-cell"  ng-click="handleClick(namesvv,0)"> {{namesvv.customername}} </div>
                          <div class="table-body-cell"  ng-click="handleClick(namesvv,0)"> {{namesvv.customerphone}} </div>
                          
                          
                          
                           <div class="table-body-cell table-body-cell"  ng-click="handleClick(namesvv,0)">{{namesvv.route_name}}</div>
                          
                          <div class="table-body-cell checkdata_1 <?php echo $checkdata_1_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.opening_balance_dr!=0">{{namesvv.opening_balance_dr | number}} </b> </div>
                          <div class="table-body-cell checkdata_2 <?php echo $checkdata_2_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.opening_balance_cr!=0">{{namesvv.opening_balance_cr | number}} </b> </div>
                          <div class="table-body-cell checkdata_3 <?php echo $checkdata_3_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.opening_balance!=0">{{namesvv.opening_balance | number}}  {{ namesvv.payment_status}}</b> </div>
                          
                          
                          <div class="table-body-cell checkdata_4 <?php echo $checkdata_4_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnDr!=0">{{namesvv.trnDr | number}}  </b> </div>
                          <div class="table-body-cell checkdata_5 <?php echo $checkdata_5_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnDrtotal!=0">{{namesvv.trnDrtotal | number}}  </b> </div>
                          <div class="table-body-cell checkdata_6 <?php echo $checkdata_6_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnCr!=0">{{namesvv.trnCr | number}}  </b> </div>
                          <div class="table-body-cell checkdata_7 <?php echo $checkdata_7_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.trnCrtotal!=0">{{namesvv.trnCrtotal | number}}  </b> </div>
                          
                          
                          
                          
                           <div class="table-body-cell checkdata_8 <?php echo $checkdata_8_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.debit!=0">{{namesvv.debit | number}}</b></div>
                           <div class="table-body-cell checkdata_9 <?php echo $checkdata_9_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.credit!=0">{{namesvv.credit | number}}</b></div>
                           
                           
                           <div class="table-body-cell checkdata_10 <?php echo $checkdata_10_hide; ?>"  ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.closeing!=0">{{namesvv.closeing | number}} {{namesvv.payment_status_bu_closeing}}</b></div>
                           
 <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>"  ng-click="handleClick(namesvv,4)"><b ng-if="namesvv.inproduction_total_return!=0">{{namesvv.inproduction_total_return | number}}</b></div>
                           
                           
                            <div class="table-body-cell checkdata_14 <?php echo $checkdata_14_hide; ?>" ng-click="handleClick(namesvv,1)"><b ng-if="namesvv.production!=0">{{namesvv.production | number}}</b></div>
                           
                           
                           <div class="table-body-cell checkdata_11 <?php echo $checkdata_11_hide; ?>" ng-click="handleClick(namesvv,2)"><b ng-if="namesvv.sheet_in_factory!=0">{{namesvv.sheet_in_factory | number}}</b></div>
                           <div class="table-body-cell checkdata_12 <?php echo $checkdata_12_hide; ?>" ng-click="handleClick(namesvv,3)"><b ng-if="namesvv.transit!=0">{{namesvv.transit | number}}</b></div>
                           <div class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.balance!=0">
                               
                               <span ng-if="namesvv.getstatus==0" style="color:red;">{{namesvv.balance | number}}</span>
                               <span ng-if="namesvv.getstatus==1" style="color:green;">{{namesvv.balance | number}}</span>
                               
                               </b></div>


                             <div   class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>" ng-click="handleClick(namesvv,0)"><b ng-if="namesvv.sheet!=0">
                               
                               <span  style="color:red;">{{namesvv.sheet | number}}</span>
                              
                               
                               </b>
                            </div>   


                              <div   class="table-body-cell checkdata_13 <?php echo $checkdata_13_hide; ?>">

                  <button type="button" ng-click="editData(namesvv.customername,namesvv.id,namesvv.closeing,namesvv.payment_status_bu_closeing,namesvv.balance)"  class="btn btn-outline-danger btn-sm">DISCOUNT</button>

                <button type="button" ng-if="namesvv.getstatus === 1 && namesvv.excess_status === 0"
                 ng-click="excessRt(namesvv.l_id,namesvv.customername,namesvv.id,namesvv.closeing,namesvv.payment_status_bu_closeing,namesvv.balance)"  class="btn btn-outline-danger btn-sm">EXCESS RT</button>


                            </div>       
                          
                          
                         
                          
                          
                       </div>
                        
              
              
              
              
          </div>      
         
         
         
        </div>




        </div>

                          
                           



    </div>
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
          <input class="form-check-input Uncheck"  value="14" <?php echo $checked14; ?> type="checkbox" id="flexSwitchCheckDefault14">
          <label class="form-check-label" for="flexSwitchCheckDefault14">Production</label>
        </div>
                  
                              
                              
                              
                              </td>
                              
                        
                             <td >
                              
                                <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="11" <?php echo $checked11; ?> type="checkbox" id="flexSwitchCheckDefault11">
          <label class="form-check-label" for="flexSwitchCheckDefault11">Sheet in Factory</label>
        </div>
                  
                              
                              
                              
                              </td>
                               
                        </tr>
                        <tr>
                             
                          <td >
                              
                              <div class="form-check form-switch form-check-inline">
          <input class="form-check-input Uncheck"  value="12" <?php echo $checked12; ?> type="checkbox" id="flexSwitchCheckDefault12">
          <label class="form-check-label" for="flexSwitchCheckDefault12">Transit</label>
        </div>
                              
                              
                              
                              
                              </td>
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



















   <div class="modal fade" id="editdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalToggleLabel_find"></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
              
               <input type="hidden" id="customer_id" name="customer_id"  class="form-control">

  <input type="hidden" id="closeing" name="closeing"  class="form-control">


               <div class="form-group row" id="credit_data" >
                  <label class="col-sm-12 col-form-label">Discount Amount </label>
                  <div class="col-sm-12">
                    <div class="some-class">
                     <input type="txt" class="form-control" name="amount"  id="amount" >
                    

                  </div>
                  </div>
               </div>
                <p id="balance_view"></p>
              
              
               <div class="form-group row" >
                  <label class="col-sm-12 col-form-label">Notes</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" rows="4" id="notes"></textarea>
                  </div>
               </div>
               
               <div class="row" style="margin: 20px -9px;">
                  <div class="col-md-12">
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary w-md ss_re"  style="float: right;" id="editSave" ng-click="bankstatementupdate()">Request Verification</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="modal fade" id="excessData" aria-hidden="true" aria-labelledby="exampleModalToggleLabelset" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <form name="myForm" ng-submit="saveExcesData()" novalidate>    
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{excessCusName}} | Closeing : {{excessCusBalance}}</h5>
                <input type="hidden" ng-model="id" value="{{id}}">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <span ng-show="error_msg"><h4 style="color:red"><b>{{error_msg}}</b></h4></span>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" id="aria-label-set"><b>Excess Return Amount </b><span style="color:red;">*</span></label>

                    <div class="col-sm-3">

                        <input type="text" min="0" id="amount_set" ng-change="getBalance(excessCusBalance)" ng-model="amount_set" name="amount" class="form-control" ng-required="true">

                        <!-- <br> -->
                    <span ng-show="excessBalanceAmd >= 0"><b style="color: blue;">CURRENT NET BAL -{{excessBalanceAmd}}</b></span>
                    </div>
                    
                    <label class="col-sm-3 col-form-label">Payment Date </label>

                    <div class="col-sm-3">

                    <input type="date" id="payment_date" ng-model="payment_date" class="form-control">

                    </div>

                </div>
                    <br>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Remarks </label>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group row">


                            <div class="col-sm-12">

                            <input type="text" id="remarks" ng-model="remarks" class="form-control">


                            </div>
                        </div>
                    </div>
                
                </div>

                <br>
                <div class="form-group row">
                    <!-- <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="1" id="Customer_1" />
                        <label for="Customer_1">Customer</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="3" id="Vendor_1" />
                        <label for="Vendor_1">Vendor</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="2" id="Driver_1" />
                        <label for="Driver_1">Driver</label>
                        <input type="radio" class="radio" name="Payer_1" ng-model="party_type1" value="5" id="Other_1" />
                        <label for="Other_1">Others Ledger</label>
                    </div> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH </label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value1" ng-model="value1" placeholder="Value" class="form-control sum">


                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-md-6"> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CASH DEPOSIT</label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" id="value2" ng-model="value2" placeholder="Value" class="form-control sum">
                            </div>
                        </div>
                    </div>


                        <!-- <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance1()" ng-keyup="completeCustomer1()" placeholder="Search Names" ng-model="party1"  id="party1">
                       
                       
                        <span ng-if="opening_balance1"><b>Avilable Balance : {{opening_balance1 | number}}</b></span> -->
                    <!-- </div> -->
                </div>
                <br>

                <div class="form-group row">
                    <!-- <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="4" id="Customer_5" />
                        <label for="Customer_2">NEFT/RTGS</label>
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="9" id="Customer_5" />
                        <label for="Customer_2">CASH</label>
                    </div> -->

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Online/Bank Transfer (Customer Acc Detail) <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" id="bank_amount" ng-model="bank_amount" placeholder="Amount" class="form-control sum">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input" placeholder="Beneficiary Name" ng-model="party6" id="party6" ng-required="bank_amount > 0 && !party5">
                    </div>
                    <br> <br> <br>
                    <div class="col-md-3">
                    <label class="col-sm-12 col-form-label" style="font-weight: 600;"></label>

                    </div>
                   
                    <div class="col-md-3">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="Account No" ng-model="account_no" id="account_no"  ng-minlength="6"  ng-required="bank_amount > 0 && !party5">
                        
                        <div ng-show="myForm.account_no.$dirty && myForm.account_no.$error.minlength">
                            <span style="color:red"><b> Please enter a valid account no.</b></span>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="IFSC Code"  ng-model="ifsc_code" id="ifsc_code"  name="ifsc_code"  ng-pattern="/\d.*[a-zA-Z]|[a-zA-Z].*\d/" maxlength="11" ng-required="bank_amount > 0 && !party5">
                    
                        <div ng-show="myForm.ifsc_code.$dirty && myForm.ifsc_code.$error.pattern">
                            <span style="color:red"><b> Please enter a valid IFSC code.</b></span>
                        </div>
                    </div>
                    <div class="col-md-3">

                    <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched"  placeholder="Branch" ng-model="notes" id="notes" ng-required="bank_amount > 0 && !party5">
                    </div>
                    <br> <br> <br>

                  

                    <div class="col-md-6">

                    </div>
                </div>

                
                <?php
               if($this->session->userdata['logged_in']['access']=='12')
                {
                ?>

                <!-- <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_5" ng-model="party_type5" value="4" id="Customer_5" />
                        <label for="Customer_5">Bank</label>
                    </div>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">BANK ACCOUNT  <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value5" ng-model="value5" placeholder="Value" class="form-control sum">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance5()" ng-keyup="completeCustomer5()" placeholder="Search Names" ng-model="party5"  id="party5" ng-required="value5 > 0 && !party5">
                       
                        <span ng-if="opening_balance5"><b>Avilable Balance : {{opening_balance5 | number}}</b></span>
                    </div>


                 
                </div> -->


                <br>
                <?php 
                } 
                ?> 


                <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="1" id="Customer_3" />
                        <label for="Customer_3">Customer</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="3" id="Vendor_3" />
                        <label for="Vendor_3">Vendor</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="2" id="Driver_3" />
                        <label for="Driver_3">Driver</label>
                        <input type="radio" class="radio" name="Payer_3" ng-model="party_type3" value="5" id="Other_3" />
                        <label for="Other_3">Others Ledger</label>
                    </div>

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">LEDGER <span style="color:red;">*</span></label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <div class="col-sm-12">

                                <input type="text" id="value3" ng-model="value3" placeholder="Value" class="form-control sum">


                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance3()" ng-keyup="completeCustomer3()" placeholder="Search Names" ng-model="party3"  id="party3" ng-required="value3 > 0 && !party3">
                       
                        <span ng-if="opening_balance3"><b>Avilable Balance : {{opening_balance3 | number}}</b></span>
                    </div>
                </div>
                <br>


                <div class="form-group row">
                    <div class="some-class1">
                        <input type="radio" class="radio" name="Payer_4" ng-model="party_type4" value="1" id="Customer_4" />
                        <label for="Customer_4">Customer</label>
                       
                    </div>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">CNN <span style="color:red;">*</span></label>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">

                                <input type="text" id="value4" ng-model="value4" placeholder="Value" class="form-control sum">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">

                        <input type="text" class="form-control border-bottom-input ng-pristine ng-valid ng-touched" ng-blur="Getbalance4()" ng-keyup="completeCustomer4()" placeholder="Search Names" ng-model="party4"  id="party4" ng-required="value4 > 0 && !party4">
                       
                        <span ng-if="opening_balance4"><b>Avilable Balance : {{opening_balance4 | number}}</b></span>
                    </div>
                    <br> <br><br>
                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">GST</label>
                    </div>
                    <br> <br> <br>

                    <div class="col-md-3">
                        <div class="form-group row">


                            <div class="col-sm-12">


                                <input type="number" id="gst" ng-model="gst" class="form-control sum" placeholder="GST Amount">

                            </div>
                        </div>
                    </div>

                 
                </div>
  <br>

              
                  

                <br>




       

                

                <div class="row">

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Total</label>
                    </div>

                    <div class="col-md-3">

                        <label class="col-sm-12 col-form-label" style="font-weight: 600;" id="totalsum">0</label>
                    </div>

                    <div class="col-md-3">
                        <label class="col-sm-12 col-form-label" style="font-weight: 600;">Difference</label>
                    </div>

                    <div class="col-md-3">

                        <label class="col-sm-12 col-form-label" style="font-weight: 600;" id="Difference">0</label>

                    </div>
                </div>

                <span ng-if="consider_gst==0" style="display:none;">

                    <label class="form-check-label" for="formrow-excess-val">Consider GST &nbsp;&nbsp;</label>
                    <input type="checkbox" class="form-check-input" name="consider_gst" value="0" id="formrow-excess-val">

                </span>

                <span ng-if="consider_gst==1" style="display:none;">

                    <label class="form-check-label" for="formrow-excess-val">Consider GST &nbsp;&nbsp;</label>
                    <input type="checkbox" class="form-check-input" checked name="consider_gst" value="1" id="formrow-excess-val">

                </span>


          


                <div class="row" style="margin: 20px -9px;">

                    <div class="col-md-12">
                        <div class="form-group row">

                            <div class="col-sm-12">
                                <input type="hidden" id="l_id">


                                <button type="submit" class="btn btn-success w-md ss_re" style="float: right;" >Request Verification</button>

                                <!-- <button type="submit" class="btn btn-primary w-md" ng-click="statusupdate('0','Rejected')">REJECTED</button> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
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
<?php

if($sales_group_id != 'ALL' || $sales_team_id != 'ALL'){
?>

$('[ng-click="search()"]').trigger('click');

<?php
}

 ?>
   


  $('#amount').on('input',function(){
      
      var val=parseInt($(this).val());
      var net_balance=parseInt($('#net_balance').val());
      var net_balance=Math.abs(net_balance);


    
      if(val>net_balance)
      {
           
           alert('Value too high');
           $(this).val('');
      }
      else
      {
          if(val>0)
          {
              var total=net_balance-val;
              $('#balance_view').text('CURRENT CLOSING : '+ total);
          }
      }
     

     
      
  });



 
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

    $(".sum").on('input',function(){
                 
                 var sum = 0
                 $('.sum').each(function () {
                        
                               
                           if($(this).val()=='')
                           {
                               var combat = 0;
                           }
                           else
                           {
                                var combat = $(this).val();
                           }
                               
                          sum += parseFloat(combat);
                          
                        
                 });

                var sumtot= parseFloat($('#amount_set').val());

                var difference=sumtot-sum;
                 $('#Difference').html(difference);

                 $('#totalsum').html(sum);

                   if(sumtot==sum)
                 {
                     //alert('Commission Amount : '+sumtot+' greater than total amount');
                     $('#UpdateCommsision').show();
                 }
                 else
                 {
                     $('#UpdateCommsision').hide();
                 }

});

  

  
   $(".Uncheck").on('click',function(){
      
      
     var val=$(this).val();
      if($(this).is(':checked'))
      {
           $('.checkdata_'+val).css('display','table-cell');
           var status=1;
      }
      else
      {
          $('.checkdata_'+val).css('display','none');
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
  $scope.getproductval = 'ALL';
$scope.sales_group = 'ALL';

   $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 1;
    $scope.searchText = '';

      $scope.excessCusName = '';
    $scope.excessCusBalance = 0;
    $scope.excessBalanceAmd = 0;
    $scope.id = null;
    $scope.payment_date =  new Date();
    $scope.error_msg='';
    <?php

     // if($_GET['test'] && $_GET['test'] == 'true'){

          $retUrl = 'list_ret_resale?test=true&';
          $ledUrl = 'ledger_find?test=true&';

     // }else{

     //      $retUrl = 'list_ret_resale?';
     //      $ledUrl = 'ledger_find?';

     // }

    ?>
  $scope.handleClick = function(namesvv,status) {
                  var fromdate = $('#from-date').val();
                  var fromto = $('#to-date').val();
                if(status == '4'){
        var customer_id = namesvv.id;

        var url = "<?php echo base_url(); ?>index.php/other_reports/<?=$retUrl?>customer_id=" + customer_id +'&formdate='+fromdate+'&todate='+fromto;
                    
                  window.open(url, '_blank');
                }else{
                   var customer_id = namesvv.id;
      if(namesvv.mark_vendor_id==0)
  {
var url = "<?php echo base_url(); ?>index.php/customer/<?=$ledUrl?>customer_id=" + customer_id +"&filter=" + status+'&formdate='+fromdate+'&todate='+fromto;
  }

  if(namesvv.mark_vendor_id>0)
  {

 var url = "<?php echo base_url(); ?>index.php/customer/ledger_commen_find?customer_id=" + customer_id +"&filter=" + status+'&formdate='+fromdate+'&todate='+fromto;
  }
                    
                  window.open(url, '_blank');
                }





                 
               };
$scope.pageSizeChanged = function() {
        
          var cateid= $('#choices-single-default').val();
          var sales_group= $('#sales_group').val();
          $scope.fetchDatagetlegderGroup(cateid,sales_group);
        
}

$scope.salesgroupChanged = function() {
      
            var cateid= $('#choices-single-default').val();
            var sales_group= $('#sales_group').val();
            $scope.fetchDatagetlegderGroup(cateid,sales_group);
}



  $scope.editData = function(customername,customer_id,amount,status,net_balance){


    $('.ss_re').show();
    $('#balance_view').text('');
         
             $('#net_balance_status').val(status);
             $('#net_balance').val(amount);
             var net_balance_set=amount.toLocaleString('ta-IN');
             $('#exampleModalToggleLabel_find').text(customername+' | Closing : '+net_balance_set);
             $('#customer_id').val(customer_id);
             //$('#amount').val(net_balance);
             $('#closeing').val(amount);
             $('#editdata').modal('toggle');
             
           
          
      };       

$scope.excessRt = function(id,customername,customer_id,closeing,status,net_balance){
    $scope.excessCusName = customername;
    $scope.excessCusBalance = closeing;
    $scope.excessBalanceAmd  = closeing;
    $scope.closeing = closeing;
    $scope.id = id;
    $scope.customer_id = customer_id;
    $('#excessData').modal('toggle');
    
}


   
   $scope.saveExcesData = function(){
    $scope.formData = {
            id : $scope.id,
            customer_id: $scope.customer_id,
            amound: $scope.amount_set,
            payment_date : $scope.payment_date,
            remarks: $scope.remarks,
            party_type1: $scope.party_type1,
            party_type2: $scope.party_type2,
            party_type3: $scope.party_type3,
            party_type4: $scope.party_type4,
            party_type5: $scope.party_type5,

            party1: $scope.party1,
            party2: $scope.party2,
            party3: $scope.party3,
            party4: $scope.party4,
            party5: $scope.party5,
            
            value1: $scope.value1,
            value2: $scope.value2,
            value3: $scope.value3,
            value4: $scope.value4,
            value5: $scope.value5,

            bank_amount : $scope.bank_amount,
            beneficiary_name: $scope.party6,
            account_no: $scope.account_no,
            ifsc_code: $scope.ifsc_code,
            notes: $scope.notes,
            gst: $scope.gst,
            closeing: $scope.closeing,
            net_balance:  $scope.excessCusBalance
         };

        //  console.log($scope.formData)
       var totalsum= $('#totalsum').text();

        $('.ss_re').hide();


        
        
// $('#totalsum').html(sum);
        if ($scope.myForm.$valid) {
            if($scope.amount_set  == totalsum){
         $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/accountheads/update_excess_return_data",
            data: $scope.formData
         
      }).then(function(response){

        if(response.data.status == "success"){
            alert(response.data.message);
            location.reload();
            }else{
                alert("An error occurred while saving the data");
                  }
          }).catch(function(error) {
                  console.error('Error saving data:', error);
               });
            }
            else{
                $scope.error_msg='Excess return amount and total should be same';

            }
            }
            else{
                $scope.error_msg='Form is invalid. Please fill required field.';
            }

            setTimeout(function() {
            $scope.$apply(function() {
                $scope.error_msg = ''; // Clear the error message
            });
            }, 5000); 

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
      var cateid= $('#choices-single-default').val();
      var sales_group= $('#sales_group').val();
      
    
      
      $scope.fetchDatagetlegderGroup(cateid,sales_group);
    
    
    
};
   $('#showhiddenrow').on('click',function(){
      
      if ($(this).is(':checked')) {
        
        var val=1;
        $('.getview').addClass('shownullvalue');
        
      } else {
         var val=0;
        $('.getview').removeClass('shownullvalue');
        
      }
      
      var status='120';
       $http({
            url: '<?php echo base_url() ?>index.php/report/table_customize',
            method: "GET", // You can also use 'POST' here
            params: {
                status_id: val,
                status_val: status
            }
        }).then(function(response) {
             var cateid= $('#choices-single-default').val();
      var sales_group= $('#sales_group').val();
      
    
      
      $scope.fetchDatagetlegderGroup(cateid,sales_group);
        }, function(error) {
            // Error callback
            console.error('Error occurred:', error);
        });
      
      
      
  });
  $scope.getBalance = function(netbalance){
    // console.log($scope.amount_set)



    if(Math.abs(netbalance)  >=  $scope.amount_set)
    {
        $scope.excessBalanceAmd =  Math.abs(netbalance) - $scope.amount_set;
    
    }
    else{
        alert("Please enter an amount that is lower than the net balance.");
        $('#amount_set').val('');
    }
  
  }


 $scope.searchTextChanged = function() {
         var cateid= $('#choices-single-default').val();
         var sales_group= $('#sales_group').val();
         $scope.fetchDatagetlegderGroup(cateid,sales_group);
 }
    
    

$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};
$('#exportdata').on('click', function() {
  
      var payment_mode=1;
      var cateid= $('#choices-single-default').val();
      var customer_id= '<?php echo $customer_id;  ?>';
      var productid= 1;
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
      var order_status= 1;
       <?php
                    $url_name =   'fetch_data_customer_balance_report_export?test=true&';
                ?>
 
      var sales_group= $('#sales_group').val();
      var payment_mode= $('#payment_mode').val();
      url = '<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id='+customer_id+'&cate_id='+cateid+'&sales_group='+sales_group+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode=1';
      location = url;

});
$scope.fetchDatagetlegderGroup = function(cateid,sales_group)
{
      $('.setload').show();
      $scope.loading = true;
      var customer_id= '<?php echo $customer_id;  ?>';
      var order_status=1;
      var payment_mode=1;
      var productid=1
      
      var fromdate= $('#from-date').val();
      var fromto= $('#to-date').val();
    
     <?php
                    $url_name = 'fetch_data_customer_balance_report_opti?test=true&';
                    // $url_name = 'fetch_data_customer_balance_report?test=true&';
                ?>
 
    
  if(cateid!=0)
  {
      
  
    
      $http.get('<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group='+sales_group+'&order_status='+cateid+'&payment_mode='+payment_mode).success(function(data)
      {
          
          
      $scope.query = {}
      $scope.queryBy = '$';
          
   
               $scope.namesDataledgergroup = data['data'];
               Object.keys(data['totals']).map((el) => {
                    // $scope['customers'] = salesData.length;

                        $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    })

               $scope.loading = false;
               $('.setload').hide();
      
     });
     
     

     
  }
  else
  {
        if(customer_id>0)
       {
          $http.get('<?php echo base_url() ?>index.php/report/<?=$url_name?>limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group=ALL&order_status=ALL&payment_mode='+payment_mode).success(function(data)
          {
              
              
          $scope.query = {}
          $scope.queryBy = '$';
              
       
                 
               $scope.namesDataledgergroup = data['data'];
 Object.keys(data['totals']).map((el) => {
                    // $scope['customers'] = salesData.length;

                        $scope[el] = Math.round(data['totals'][el] * Math.pow(10, 2)) / Math.pow(10, 2);
                    })
                   $scope.loading = false;
                   $('.setload').hide();
          
         });
         
           
       }
       else
       {
                $scope.loading = false;
               $('.setload').hide();
       }
     
              
      
  }
  
  
  

     
     
     
    
    
  };
  
  
  
  
  
 $scope.bankstatementupdate = function()
   {


 var amount= $("#amount").val();

if(amount>0)
{



      if (confirm("Are you sure confirm!") == true) 
      {

          $('.ss_re').hide();

           var amount= $("#amount").val();

           var customer_id=$('#customer_id').val();
           var notes=$('#notes').val();
           var closeing=$('#closeing').val();

            var net_balance=$('#net_balance').val();
           var balance_view=$('#balance_view').text();
            var net_balance_status=$('#net_balance_status').val();

            $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/manual_journals/insertandupdate",
            data:    {
            'get_users': customer_id,
            'party_type':1,
            'credits_value_data': amount,
            'net_balance': net_balance,
            'net_balance_status': net_balance_status,
            'blance_text': balance_view,
            'closeing': closeing,
            'notes': notes,
            'action': 'discount_request',
         }
      }).success(function(data){


           $('#net_balance').val('');
           $('#amount').val('');
           $('#notes').val('');


           
           alert('Approvel Request success');
           $('#editdata').modal('toggle');
          });
      }

}
else
{
   alert('Enter The amount');
}




    };



$scope.completeCustomer1=function(){
       var search=  $('#party1').val();
      var party= $("input[name='Payer_1']:checked").val();
      
       $('#party1').autocomplete({   
         source: $scope.availableTags
       });
       
    //    console.log($scope.availableTags)
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
      var party= $("input[name='Payer_2']:checked").val();
      
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
      var party= $("input[name='Payer_3']:checked").val();
      
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

   $scope.completeCustomer4=function(){
       var search=  $('#party4').val();
      var party= $("input[name='Payer_4']:checked").val();
      
       $( "#party4" ).autocomplete({   
         source: $scope.availableTags
       });
       
       $http({
         method:"POST",
         url:"<?php echo base_url() ?>index.php/manual_journals/userget_cnn",
         data:{'search':search,'party_type':party}
       }).success(function(data){
   
             $scope.availableTags = data;
       });

   }; 

   $scope.completeCustomer5=function(){
       var search=  $('#party5').val();
      var party= $("input[name='Payer_5']:checked").val();
      
       $( "#party5" ).autocomplete({   
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



$scope.Getbalance1 = function () {
     
       var l_id=  $('#l_id_1').val();
       var party=  $('#party1').val();
      
        var party_type= $("input[name='Payer_1']:checked").val();
          $http({
             method:"POST",
             url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
             data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
           }).success(function(data){
                $scope.opening_balance1 = data.opening_balance;
            
           });
           
};   

$scope.Getbalance2 = function () {
     
     var l_id=  $('#l_id_1').val();
     var party=  $('#party2').val();
    
      var party_type= $("input[name='Payer_2']:checked").val();
        $http({
           method:"POST",
           url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
           data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
         }).success(function(data){
              $scope.opening_balance2 = data.opening_balance;
          
         });
         
}; 

$scope.Getbalance3 = function () {
     
     var l_id=  $('#l_id_1').val();
     var party=  $('#party3').val();
    
      var party_type= $("input[name='Payer_3']:checked").val();
        $http({
           method:"POST",
           url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
           data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
         }).success(function(data){
              $scope.opening_balance3 = data.opening_balance;
          
         });
         
}; 

$scope.Getbalance4 = function () {
     
     var l_id=  $('#l_id_1').val();
     var party=  $('#party4').val();
    
      var party_type= $("input[name='Payer_4']:checked").val();
        $http({
           method:"POST",
           url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
           data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
         }).success(function(data){
              $scope.opening_balance4 = data.opening_balance;
          
         });
         
}; 
  
$scope.Getbalance5 = function () {
     
     var l_id=  $('#l_id_1').val();
     var party=  $('#party5').val();
    
      var party_type= $("input[name='Payer_5']:checked").val();
        $http({
           method:"POST",
           url:"<?php echo base_url(); ?>index.php/customer/fetch_balance",
           data:{'id':party, 'action':'fetch_single_data','tablename':'customers','party_type':party_type}
         }).success(function(data){
              $scope.opening_balance5 = data.opening_balance;
          
         });
         
}; 


  
  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



