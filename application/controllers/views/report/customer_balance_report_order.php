<?php  include "header.php"; ?>

<style>
.trpoint {
    
    cursor: pointer;
   
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

</style>



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
                                    <h4 class="mb-sm-0 font-size-18">In production & Sheet in factory report (order wise data)</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Customer Balance  Report !</li>
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
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>" seletced><?php echo $val->name; ?></option>
                                                                      
                                                                             <?php 
                                                                            
                                                                             }
                                                                             
                                                                         }
                                                                         else
                                                                         {
                                                                             ?>
                                                                             
                                                                             <option  value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                                                  
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
                                                                 <option  value="<?php echo $vals->id; ?>"><?php echo $vals->name; ?></option>
                                                          
                                                                <?php
                                                            }
                                                            
                                                            ?>
                                                           
                                                           
                                                            
                            </select>
                         </div>
                            
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="from-date" value="<?php echo date('Y-07-01'); ?>">
                            </div>
                            <div class="col">
                              <input type="date" class="form-control" min="<?php echo date('Y-07-01'); ?>" id="to-date" value="<?php echo  date('Y-m-d'); ?>">
                            </div>
                            
                           
                            
                            
                            
                             <div class="col">
                             <button type="button" class="btn btn-secondary waves-effect waves-light" ng-click="search()">Search</button>
                             
                             <button type="button" class="btn btn-success waves-effect waves-light" id="exportdata" >Export</button>
                             
                             
                             </div>
                           
                          </div>
                      </form>
                         
                         
                         
                     
                     
                     
                     
                  <div id="search-view" style="display:none;" >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                     

                                           <h4 class="card-title">In production & Sheet in factory report (order wise data)
                                           <br>{{formdate}} To {{todate}}</h4>
                                           
                                        </p>
                                    </div>
                   </div> 
                   
                   <div id="search-view1"  >
                      
                                     <div class="card-header"  ng-init="fetchSingleData(0)">
                                           <h4 class="card-title">In production & Sheet in factory report (order wise data)
                                           <br><?php echo date('Y-07-01',strtotime("-1 year")); ?> To <?php echo $this->session->userdata['logged_in']['to_date']; ?></h4>
                                           
                                           
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
                             
                              <!--<label for="showhiddenrow" style="float: right;margin: 9px 9px;">
                                  <input type="checkbox" id="showhiddenrow" <?php echo $checked120; ?>>
                                  Show null balance
                              </label>
                              <button type="button" ng-click="onviewparty()" class="btn btn-soft-danger  waves-effect waves-light" style="float: right;">Customize table</button>-->
                           
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
                          <div  class="table-body-cell">Order NO</div>
                          <div  class="table-body-cell  ">In Production Return</div>
                          <div  class="table-body-cell  ">In Production</div>
                          <div  class="table-body-cell  ">Sheet_in_Factory</div>
                          <div  class="table-body-cell  ">Transit</div>
                          <div  class="table-body-cell  ">Order By</div>
                          <div  class="table-body-cell  ">Create Date</div>
                          
                          
            
        </div>
        
        
       <div class="resp-table-row setload"> 
                          
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"></div>
                                   <div class="table-body-cell"><loading></loading></div>
                                   <div class="table-body-cell "></div>
                                   <div class="table-body-cell "></div>
                                   <div class="table-body-cell "></div>
                                   <div class="table-body-cell "></div>
                                   <div class="table-body-cell "></div>
                               
                               
                                 
        </div>
        
        
        <div class="primary" ng-repeat="names in namesDataledgergroup">
        
         <div class="resp-table-row trpoint" style="background: #fff1e7;"  >
                          
                           <div class="table-body-cell">{{names.no}}</div>
                           <div class="table-body-cell"><b style="color:#ff5e14;"> {{names.sales_group_name}}</b></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"><b style="color:#ff5e14;" ng-if="names.production_return!=0">{{names.production_return | number}}</b></div>
                           <div class="table-body-cell"><b style="color:#ff5e14;" ng-if="names.production!=0">{{names.production | number}}</b></div>
                           <div class="table-body-cell"><b style="color:#ff5e14;" ng-if="names.sheet_in_factory!=0">{{names.sheet_in_factory | number}}</b></div>
                           <div class="table-body-cell"><b style="color:#ff5e14;" ng-if="names.transit!=0">{{names.transit | number}}</b></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                            

         </div>
         
         
         <div class="secondchild" ng-repeat="namesvvssget in names.salesperson">
             
         
         <div class="resp-table-row" >
                          
                           
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"><b class="sales_name">{{namesvvssget.sales_person_name}}</b></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>
                          <div class="table-body-cell"></div>    
                        
                         
                         
                        
         </div>
         
         
         
          <div class="chriedchild" ng-repeat="namesvv in namesvvssget.subarray | filter:query" >
              
              <div class="resp-table-row {{ namesvv.hidestatus }}" ng-if="namesvvssget.sales_team_id==namesvv.sales_team_id">
                           
                           <div class="table-body-cell">{{namesvv.no}}</div>
                           <div class="table-body-cell"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.customername}}</a></div>
                           <div class="table-body-cell"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.customerphone}}</a></div>
                           <div class="table-body-cell table-body-cell"><a href="<?php echo base_url(); ?>index.php/customer/ledger_find?customer_id={{namesvv.id}}" target="_blank">{{namesvv.route_name}}</a></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
            </div>
            
            
            
            
            
            <div class="chriedchild" ng-repeat="namesorders in namesvv.suborders" >
              
              <div class="resp-table-row" ng-if="namesorders.customer_id==namesvv.id">
                           
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell"></div>
                           <div class="table-body-cell">{{namesorders.order_no}}</div>
                           <div class="table-body-cell"><span ng-if="namesorders.in_production_return>0">{{namesorders.in_production_return}}</span></div>
                           <div class="table-body-cell"><span ng-if="namesorders.in_production>0">{{namesorders.in_production}}</span></div>
                           <div class="table-body-cell"><span ng-if="namesorders.Sheet_in_Factory>0">{{namesorders.Sheet_in_Factory}}</span></div>
                           <div class="table-body-cell"><span ng-if="namesorders.Transit>0">{{namesorders.Transit}}</span></div>
                           
                           <div class="table-body-cell">{{namesorders.user_id}}</div>
                           <div class="table-body-cell">{{namesorders.create_date}}</div>
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
        
        var val=1;
        $('.getview').addClass('shownullvalue');
        
      } else {
         var val=0;
        $('.getview').removeClass('shownullvalue');
        
      }
      
      var status='120';
       $.ajax({
      url: '<?php echo base_url() ?>index.php/report/table_customize',
      type: "get", //send it through get method
      data: { 
        status_id: val, 
        status_val: status
      }
    });
      
      
      
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
      url = '<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_export_order?limit=10&customer_id='+customer_id+'&cate_id='+cateid+'&sales_group='+sales_group+'&productid='+productid+'&formdate='+fromdate+'&todate='+fromto+'&order_status='+order_status+'&payment_mode='+payment_mode;
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
        
          var cateid= $('#choices-single-default').val();
          var sales_group= $('#sales_group').val();
          $scope.fetchDatagetlegderGroup(cateid,sales_group);
        
}

$scope.salesgroupChanged = function() {
      
            var cateid= $('#choices-single-default').val();
            var sales_group= $('#sales_group').val();
            $scope.fetchDatagetlegderGroup(cateid,sales_group);
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

 $scope.searchTextChanged = function() {
         var cateid= $('#choices-single-default').val();
         var sales_group= $('#sales_group').val();
         $scope.fetchDatagetlegderGroup(cateid,sales_group);
 }
    
    

$scope.onviewparty = function(){
     $('#firstmodalcommisonparty').modal('toggle');
    
};

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
    
    
 
    
  if(cateid!=0)
  {
      
  
    
      $http.get('<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report_order?limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group='+sales_group+'&order_status='+cateid+'&payment_mode='+payment_mode).success(function(data)
      {
          
          
      $scope.query = {}
      $scope.queryBy = '$';
          
   
               $scope.namesDataledgergroup = data;
               $scope.loading = false;
               $('.setload').hide();
      
     });
     
     

     
  }
  else
  {
        if(customer_id>0)
       {
           $http.get('<?php echo base_url() ?>index.php/report/fetch_data_customer_balance_report?limit=10&customer_id='+customer_id+'&formdate='+fromdate+'&page=' + $scope.currentPage +'&size=' + $scope.pageSize +'&search=' + $scope.searchText+'&todate='+fromto+'&sales_group=ALL&order_status=ALL&payment_mode='+payment_mode).success(function(data)
          {
              
              
          $scope.query = {}
          $scope.queryBy = '$';
              
       
                   $scope.namesDataledgergroup = data;
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
  
  
  
  
  

  
  
  
  

});

</script>
    <?php include ('footer.php'); ?>
</body>



