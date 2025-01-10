<?php  include "header.php"; ?>
<style>
    button.btn.btn-outline-primary {
   padding: 1px 5px;
    margin: 2px;
}
    a.btn.btn-outline-primary {
    padding: 1px 5px;
    margin: 2px;
}
button.btn.btn-outline-danger {
   padding: 1px 5px;
    margin: 2px;
}


.next-btn,.pre-btn {
    border: none;
    background: lightgrey;
    padding: 6px 28px;
    margin: 15px 22px;
    border-radius: 10px;
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
                                    <h4 class="mb-sm-0 font-size-18">Customer List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/customer/customer_add">Customer Form</a></li>
                                            <li class="breadcrumb-item active"> Customer List </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                    <div class="row">
              <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                                        <h4 class="card-title">Customer List Table</h4>
                                        
                    </div>
                    
                    
                                        
                    <div class="col-lg-12">
                         
                         <button type="button" style="float: right;margin: 7px 20px;"  class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Import Customer</button>
                    
                                            
                    </div>  





<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Import Customer</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                         <form enctype='multipart/form-data' action="<?php echo base_url(); ?>customer_import.php" method="POST" >
                                                        <div class="modal-body">
                                                           
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">File:</label>
                                                                    <input type="file" class="form-control" required name="file" id="recipient-name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Sample Format : </label>
                                                                    <a href="<?php echo base_url(); ?>Sample_Customer_import.xlsx">Download</a>
                                                                </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="sumnit" class="btn btn-primary">Import</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->







                    
                  <div class="card-body" >

                                             
                            <input type="hidden" id="nextnumber" value="0">   
                            <input type="hidden" id="prenumber" value="10">  
                            <input type="hidden" id="pageSize" value="10">  
                                              

    
        <div class="col-md-12" >
            <div class="panel panel-default">
              
              <div class="panel-body">
              <!-- TOP OF TABLE: shows page size and search box -->
              <div class="dataTables_wrapper form-inline" role="grid">
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-sm-2">
                        <div class="dataTables_length" id="example_length">
                            <label>
                            <select name="example_length" aria-controls="example" class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1000">1000</option>
                            </select> Records Per page</label>
                        </div>
                    </div>
                      
                    <div class="col-sm-5" style="margin: -14px 0px;">
                        
                        
                        
                        
                        <div class="dataTables_length" ole="alert" aria-live="polite" aria-relevant="all">Showing <b>{{startItem}}</b> to <b>{{endItem}}</b> of <b>{{totalItems}}</b> entries   <button type="button" class="pre-btn" ng-Click="onPre(1,10)">PRE</button><button type="button" class="next-btn" ng-Click="onNext(1,10)">NEXT</button></div>
                        
                        
                        
                      
                        
                        
                    </div>
                    
                    
                    <div class="col-sm-3">
                     
                     <select class="form-control"  data-trigger name="choices-single-default" id="choices-single-default"ng-change="filterSalespersion()" ng-model="salespersion">
                                                            
                         
                         
                         <option value="">Filter Sales Member</option>
                         <?php
                         
                         foreach($sales_team as $val)
                         {
                             
                             ?>
                              <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                             
                             <?php
                         }
                         
                         ?>
                        
                         
                     </select>   
                        
                    </div>
                   
                
                    <div class="col-sm-2">
                        <div id="example_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" aria-controls="example" ng-model="searchText" ng-change="searchTextChanged()"></label>
                        </div>
                    </div>
                </div>                        

               
               <div class="table-responsive">
              
               
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                         
                          <th>Company Name</th>
                          <th>Phone 1</th>
                          <th>Phone 2</th>
                          
                          <th style="width: 250px !important;display: flex;">Address</th>
                          <th style="width: 45px;">GST_Status</th>
                          <th style="width: 45px;">GST</th>
                         
                          <th style="width: 100%;">Sales_Group</th>
                          <th style="width: 100%;">Sales_Member</th>
                          <th style="width: 250px !important;display: flex;">Route</th>
                          <th style="width: 100%;">Locality</th>
                          <th style="width: 100%;">Customer_Type</th>
                          
                          <?php
                          if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                          {
                                                
                             ?>
                             
                             <th >Opening_Balance</th>   
                             <th></th>
                             
                             <?php
                                                
                          }
                          ?>
                          
                           <th >Cridet_limit</th>
                           <th >Credit_Period</th>
                          
                           <th style="width: 100%;">Feedback</th>
                           <th >Rating <br> (1 to 5)</th>
                          
                           <th>Price_Rating <br> (1 to 5)</th>
                           <th>Delivery_Time_Rating <br> (1 to 5)</th>
                           <th>Quality_Rating <br> (1 to 5)</th>
                           <th>Response<br> (1 to 5)</th>
                           <th>Action</th>
                         
                    </tr>
                </thead>

                <tbody>
                    <tr ng-repeat = "name in activity">
                         <td>{{name.no}}</td>
                          <td>{{name.company_name}}</td>
                          
                        
                          <td>{{name.phone}}</td>
                            <td><input class="form-control" value="{{name.landline}}" style="width: 150px;" ng-blur="changelandline(name.id)" id="ph_{{name.id}}"></td>
                      
                          
                          <td>{{name.address}}</td>
                          
                           <td>
                              
                              <select class="form-control" style="width: 150px;" ng-blur="changegststatus(name.id)" id="gss_{{name.id}}" >
                                  
                               
                                 
                                       <option value="1" ng-selected="{{name.gst_status == 1}}">Registered</option>
                                       <option value="2" ng-selected="{{name.gst_status == 2}}">Un-Registered</option>
                                 
                                  
                              </select>
                              
                              
                             
                          
                          
                          
                          </td>
                          
                          <td>
                               
                               
                               <input class="form-control" value="{{name.gst}}"  ng-if="name.gst_status==1 || name.gst_status==0"  style="width: 180px;" ng-blur="inputgststatus(name.id)" id="gsts_{{name.id}}">
                              
                                  <input class="form-control"  ng-if="name.gst_status==2" readonly  style="width: 180px;" ng-blur="inputgststatus(name.id)" id="gsts_{{name.id}}">
                              
                            
                              
                              
                              </td>
                                 
                                
                          
                        
                          
                          
                          
                          <td style="width: 150px;">{{name.access}}</td>
                          
                          
                           
                         
                          
                           <td>
                               
                               <?php
                          if($this->session->userdata['logged_in']['access']=='1')
                          {
                                                
                             ?>
                             
                             
                              <select class="form-control" style="width: 150px;" ng-blur="changesales(name.id)" id="stt_{{name.id}}" >
                                  
                               
                                  <?php
                                  foreach($sales_team as $val)
                                  {
                                      ?>
                                       <option value="<?php echo $val->id; ?>" ng-selected="{{name.sales_team_id == <?php echo $val->id; ?>}}"><?php echo $val->name; ?></option>
                                      <?php
                                  }
                                  ?>
                                 
                                  
                              </select>
                              
                             
                             
                             <?php
                             
                          }
                          else
                          {
                              ?>
                              
                              {{name.sales_team_name}}
                              <?php
                          }
                             
                             ?>
                              
                             
                              
                             
                          
                          
                          
                          </td>
                            <td>{{name.route}}</td>
                          <td>
                              
                              
                              
                           <input class="form-control" value="{{name.locality_name}}" ng-blur="changelocality(name.id)" ng-keyup="completeProduct2(name.id)"  style="width: 180px;"  id="dd_{{name.id}}">
                              
                             
                          
                          
                          
                          </td>
                          
                          
                          
                          
                          <td>
                              
                              <select class="form-control" style="width: 150px;" ng-blur="changecustomre_type(name.id)" id="cy_{{name.id}}" >
                                  
                                  <option value="{{name.customer_type}}" selected > {{name.customer_type}}</option>
                                  <?php
                                  for($i=0;$i<count($option);$i++)
                                  {
                                      ?>
                                       <option value="<?php echo $option[$i]; ?>"><?php echo $option[$i]; ?></option>
                                       
                                      <?php
                                  }
                                  ?>
                                 
                                  
                              </select>
                              
                              
                             
                          
                          
                          
                          </td>
                          
                          
                          
                          
                          
                          


                          
                        
                        <?php
             if($this->session->userdata['logged_in']['access']=='1')
                          {
                                                
                             ?>
                             
                              <td>
                                     
                                     
                                 
                                 <input class="form-control" type="number" value="{{name.opening_balance}}" style="width: 150px;" ng-blur="changeopening_balance(name.id)" id="oo_{{name.id}}">
                                 
                                 
                            
                                 
                             
                                 </td>
                      
                             
                                 <td>
                                     
                                     
                                 
                              
                                 
                             <select  style="width: 70px;margin: 8px 0px;" ng-blur="changepaystatus(name.id)" id="pay_{{name.id}}" >
                                  
                                       
                                        <option value="">Select</option>
                                       <option value="1"  ng-selected="{{name.payment_status == 1}}">CR</option>
                                       <option value="2"  ng-selected="{{name.payment_status == 2}}">DR</option>
                                       
                                 
                                 
                                  
                              </select>
                                 
                                 
                                 
                                 </td>
                      
                            
                             
                             <?php
                                                
                          }
                          ?>
                          










    
                        <?php
             if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                          {
                                                
                             ?>
                             
                              <td>
                                     
                                {{name.opening_balance}}
                                 
                            
                                 
                             
                                 </td>
                      
                             
                                 <td>
                                     
                                     
                                 
                              
                                 
                             <select  style="width: 70px;margin: 8px 0px;" disabled >
                                  
                                       
                                        <option value="">Select</option>
                                       <option value="1"  ng-selected="{{name.payment_status == 1}}">CR</option>
                                       <option value="2"  ng-selected="{{name.payment_status == 2}}">DR</option>
                                       
                                 
                                 
                                  
                              </select>
                                 
                                 
                                 
                                 </td>
                      
                            
                             
                             <?php
                                                
                          }
                          ?>
                          



















                          
                          <td><input class="form-control" type="number" value="{{name.credit_limit}}"  style="width: 75px;" ng-blur="changecredit_limit(name.id)" id="ccl_{{name.id}}"></td>
                      
                             <td><input class="form-control" value="{{name.credit_period}}" style="width: 75px;"  ng-blur="changecredit_period(name.id)" id="ccp_{{name.id}}"></td>
                      
                      
                        
                          <td><input class="form-control" value="{{name.feedback_details}}" style="width: 150px;" ng-blur="changefeedback_details(name.id)" id="ff_{{name.id}}"></td>
                      
                       
                      
                      
                        <td><input class="form-control" value="{{name.ratings}}" style="width: 55px;" ng-blur="changeratings(name.id)" id="rr_{{name.id}}"></td>
                        
                         <td><input class="form-control" value="{{name.price_rateings}}" style="width: 55px;" ng-blur="changeratingsA(name.id)" id="aaa_{{name.id}}"></td>
                         <td><input class="form-control" value="{{name.delivery_time_rateings}}" style="width: 55px;" ng-blur="changeratingsB(name.id)" id="bbb_{{name.id}}"></td>
                         <td><input class="form-control" value="{{name.quality_rateings}}" style="width: 55px;" ng-blur="changeratingsC(name.id)" id="ccc_{{name.id}}"></td>
                         <td><input class="form-control" value="{{name.response_commission}}"  style="width: 55px;" ng-blur="changeratingsD(name.id)" id="ddd_{{name.id}}"></td>
                        
                        
                          <td style="display:flex;">
                          <button type="button" ng-click="viewAddress(name.id)"  title="View" class="btn btn-outline-primary"><i class="mdi mdi-eye menu-icon"></i></button> 
                          
                          
                          <button type="button" ng-click="addAddress(name.id)"  title="Address Add" class="btn btn-outline-primary"><i class="mdi mdi-plus menu-icon"></i></button>
                         
                          <?php
                          if($this->session->userdata['logged_in']['access']=='15')
                          {
                                                
                             ?>
                         
                          <a href="<?php echo base_url(); ?>index.php/customer/customer_edit/{{name.id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                          
                           
                             <?php
                                                
                          }
                          ?>
                          
                          <?php
                          if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='11')
                          {
                                                
                             ?>
                         
                          <a href="<?php echo base_url(); ?>index.php/customer/customer_edit/{{name.id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                          <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>
                         
                           
                             <?php
                                                
                          }
                          ?>
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

                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            







        </div>
    </div>












  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Customer Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                              
                                                                <div >
                                                                    
                                                                 <table class="table" ng-init="fetchDataelight()">
                                                                     <tr>
                                                                         <th>Company Name</th>
                                                                         <th>:</th>
                                                                         <td>{{company_name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Office Contact</th>
                                                                         <th>:</th>
                                                                         <td>{{phone_view}} , {{email}}</td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Office Address</th>
                                                                         <th>:</th>
                                                                         <td>{{address_view}}</td>
                                                                     </tr>
                                                                     
                                                                         <tr>
                                                                         <th>Google Location (Lat,Long)</th>
                                                                         <th>:</th>
                                                                         <td>{{google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>GST</th>
                                                                         <th>:</th>
                                                                         <td>{{gst}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Sales Group</th>
                                                                         <th>:</th>
                                                                         <td>{{sales_group_name}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>Feedback</th>
                                                                         <th>:</th>
                                                                         <td><b>{{feedback}}</b> <br> {{feedback_details}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Ratings</th>
                                                                         <th>:</th>
                                                                         <td>
                                                                             
                                                                             <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Basic Rater</h5>
                                                    <div id="basic-rater"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Rater with Step</h5>
                                                    <div id="rater-step"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Custom Messages</h5>
                                                    <div id="rater-message"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6" style="display:none;">
                                                <div class="p-lg-5 p-4 text-center" dir="ltr">
                                                    <h5 class="font-size-15 mb-4">Example with unlimited number of stars. readOnly option is set to true.</h5>
                                                    <div id="rater-unlimitedstar"></div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                          
                                                    
                                                    <div id="rater-onhover" class="align-middle"></div>
                                                    <span class="ratingnum badge bg-info align-middle ms-2"></span>
                                               
                                            
                                            </td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     <tr>
                                                                         <th>Credit limit</th>
                                                                         <th>:</th>
                                                                         <td>{{credit_limit}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      
                                                                     <tr>
                                                                         <th>Credit Period</th>
                                                                         <th>:</th>
                                                                         <td>{{credit_period}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                     
                                                                 </table>        
                                                                    
                                                                
                                                                </div>
                                                                
                                                                <div ng-init="fetchDataaddress()">
                                                                
                                                                <table class="table" ng-repeat="names in namesDataaddress">
                                                                    
                                                                     <tr style="background: #f1f1f1;">
                                                                        
                                                                         <td colspan="3" ><label for="set_{{names.id}}" style="cursor: pointer;margin-bottom: 0px;"><b>{{names.no}} .</b>  Address</label>  <button type="button" ng-click="deleteDataaddress(names.id,hidden_id)" style="float:right;" class="btn btn--danger"><i class="mdi mdi-delete menu-icon"></i></button></td>
                                                                     </tr>
                                                                    
                                                                     <tr>
                                                                         <th>Contact Name</th>
                                                                         <th>:</th>
                                                                         <td>{{names.name}}</td>
                                                                     </tr>
                                                                     
                                                                     <tr>
                                                                         <th>Contact Phone </th>
                                                                         <th>:</th>
                                                                         <td>{{names.phone}} </td>
                                                                     </tr>
                                                                     
                                                                      <tr>
                                                                         <th>Address  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.address}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                      <tr>
                                                                         <th>Google Location (Lat,Long)  </th>
                                                                         <th>:</th>
                                                                         <td>{{names.google_map_link}}</td>
                                                                     </tr>
                                                                     
                                                                     
                                                                    
                                                                     
                                                                     
                                                                 </table>  
                                                                 
                                                                 
                                                                 
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                                
                                                
                                                
                                                
                                                
                                                
             

  <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Address Add</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
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
                                                                
                                                                <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    



                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Contact name <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="name" class="form-control" required name="name" ng-model="name" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Contact Phone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="phone" class="form-control" name="phone"   required ng-model="phone" type="phone">
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Address line 1 <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="address1" class="form-control" name="address1" required ng-model="address1" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label"> Address line 2</label>
                            <div class="col-sm-12">
                             <input id="address2" class="form-control" name="address2"   ng-model="address2" type="address2">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Locality <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                               <select class="form-control" name="locality" required ng-model="locality">

                              <option value=""> Select locality</option>

                              <?php
                                foreach ($locality as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pincode <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="pincode" class="form-control" ng-blur="getpencodeDetails($event)" name="pincode" required ng-model="pincode" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Landmark </label>
                            <div class="col-sm-12">
                             <input id="landmark" class="form-control" name="landmark"    ng-model="landmark" type="landmark">
                            </div>
                          </div>
                        </div>

                       
                     
                         

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Zone <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="locality" class="form-control" name="zone" required   ng-model="zone" type="zone">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">City <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="city" class="form-control" name="city" required ng-model="city" type="text">
                            </div>
                          </div>
                        </div>
                        
                      
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">State <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="state" class="form-control" name="state"  required  ng-model="state" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Google Location (Lat,Long) </label>
                            <div class="col-sm-12">
                             <input id="google_map_link" class="form-control" name="google_map_link"    ng-model="google_map_link" type="text">
                            </div>
                          </div>
                        </div>

                        
                      </div>

                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                       
                                                     
                                                                
                                                                
                                                              
                                                                
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                               
                                                            </div>
                                                            
                                                               </form>  
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                
                                      
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
     
     

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

 
var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){
    
    

  $scope.success = false;
  $scope.error = false;



 $scope.salespersion
    
    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.searchText = '';
    getData();

    function getData() {
     $http.get('<?php echo base_url() ?>index.php/customer/fetch_data?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&searchsales=' + $scope.salespersion)
        .success(function(data) {
            $scope.activity = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
            $scope.endItem = $scope.currentPage * $scope.pageSize;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.activity.push(temp);
                
                
            });
        });
        
       
    }
    
    
    $scope.pageChanged = function() {
        getData();
    }
    $scope.pageSizeChanged = function() {
        
        $scope.currentPage = 1;
        
        $('#pageSize').val($scope.pageSize);
        
        getData();
        
        
        
    }
    $scope.searchTextChanged = function() {
        $scope.currentPage = 1;
        getData();
    }
    
    
    
    
    
     function getDataPage(currentPage,pageSize) {
         
         
         
         
         
     $http.get('<?php echo base_url() ?>index.php/customer/fetch_data?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&searchsales=' + $scope.salespersion)
        .success(function(data) {
            $scope.activity = [];
            $scope.totalItems = data.totalCount;
            $scope.startItem = currentPage-pageSize+1;
            $scope.endItem = currentPage ;
            if ($scope.endItem > $scope.totalCount) {$scope.endItem = $scope.totalCount;}
            angular.forEach(data.PortalActivity, function(temp){
                $scope.activity.push(temp);
            });
        });
    }




    $scope.completeProduct2=function(id){
    $( "#dd_"+id ).autocomplete({
      source: $scope.availableProducts2
    });
    } 
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/locality_list",
      data:{'action':'fetch_single_data'}
      }).success(function(data){

          $scope.availableProducts2 = data;
     
      });
   
   


$scope.onNext = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#nextnumber').val());
      var pageSize= parseInt($('#pageSize').val());
     
      var currentPage=nextnumber+pageSize;
      
       $('#nextnumber').val(currentPage);
       $('#prenumber').val(currentPage);
      
      getDataPage(currentPage,pageSize);
      
      
 };



$scope.onPre = function(currentPage,pageSize){
     
     
      var nextnumber= parseInt($('#prenumber').val());
      var pageSize= parseInt($('#pageSize').val());
      
       var currentPage=nextnumber-pageSize;
      
       $('#prenumber').val(currentPage);
       $('#nextnumber').val(currentPage);
       getDataPage(currentPage,pageSize);
      
      
 };








$scope.filterSalespersion = function(){
     
     
      getData();
      
      
 };





var keepGoing = true;
 
 $scope.changelocality = function(id){
     
     
     
     var locality=$('#dd_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'locality':locality, 'action':'updatelocality','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };

$scope.changefeedback_details = function(id){
     
     
     
     var feedback=$('#ff_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'feedback':feedback, 'action':'updatefeedback','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 
 
 
 
 
 
 
 
 $scope.changeopening_balance = function(id){
     
     
     
    var bb=$('#pay_'+id).val();
     var obalance=$('#oo_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
         data:{'id':id,'val':bb, 'action':'updatevalue','lab':'payment_status','obalance':obalance,'tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
  $scope.changepaystatus = function(id){
     
     
     
     var bb=$('#pay_'+id).val();
     var obalance=$('#oo_'+id).val();
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'payment_status','obalance':obalance,'tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 

                 
 $scope.changelandline = function(id){
     
     
     
     var bb=$('#ph_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'landline','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
  $scope.changecustomre_type = function(id){
     
     
     
     var bb=$('#cy_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'customer_type','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 
   $scope.changesales = function(id){
     
     
     
     var bb=$('#stt_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'sales_team_id','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 $scope.changegststatus = function(id){
     
     
     
     var bb=$('#gss_'+id).val();
     
     
     if(bb==1)
     {
         $('#gsts_'+id).attr('readonly',false);
     }
     else
     {
         $('#gsts_'+id).attr('readonly',true);
     }
     
     
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'gst_status','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
  $scope.inputgststatus = function(id){
     
     
     
     var bb=$('#gsts_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'gst','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 
  $scope.changecredit_limit = function(id){
     
     
     
     var bb=$('#ccl_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'credit_limit','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
  $scope.changecredit_period = function(id){
     
     
     
     var bb=$('#ccp_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'credit_period','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 $scope.changeratings = function(id){
     
     
     
     var ratings=$('#rr_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 







$scope.changeratingsA = function(id){
     
     
     
     var ratings=$('#aaa_'+id).val();
     

 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_a','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };
 
 
$scope.changeratingsB = function(id){
     
     
     
     var ratings=$('#bbb_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_b','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };

$scope.changeratingsC = function(id){
     
     
     
     var ratings=$('#ccc_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_c','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };




$scope.changeratingsD = function(id){
     
     
     
     var ratings=$('#ddd_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_d','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        //getData();
      }); 
    
     keepGoing = false;
     
 };



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customers'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
      }); 
    }
};

$scope.deleteDataaddress= function(id,hidden_id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/customer/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'customers_adddrss'}
      }).success(function(data){
         $scope.fetchDataaddress(hidden_id);
      }); 
    }
};





 $scope.fetchDataelight = function(id){
     
     
     
      $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'customers'}
    }).success(function(data){

        $scope.name =  data.name;
        $scope.email = data.email;
        $scope.phone_view = data.phone;
        $scope.company_name = data.company_name;
        $scope.gst = data.gst;
        $scope.sales_group = data.sales_group;
        $scope.sales_team_id = data.sales_team_id;
        $scope.hidden_id = data.id;
        
        
        
        $scope.sales_group_name = data.sales_group_name;
        

        $scope.pin = data.pin;
     
        $scope.address_view = data.address;
        $scope.landmark = data.landmark;
        
        
        
        $scope.zone = data.zone;
        $scope.feedback_details = data.feedback_details;
        $scope.feedback = data.feedback_sub;
        $scope.credit_limit = data.credit_limit;
        $scope.credit_period = data.credit_period;
        $scope.ratings = data.ratings+'%';
        
       
        
        $('.star-value').css('background-size','22px;');
        $('.star-value').css('width', $scope.ratings);
        

        $scope.locality = data.locality;


        $scope.city = data.city;
        $scope.state = data.state;
        $scope.landline = data.landline;
        $scope.google_map_link = data.google_map_link;
      


     
    });
     
     
 }


$scope.getpencodeDetails = function (event) {







 $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/pincode",
      data:{'pincode':$scope.pincode}
    }).success(function(data){

            $scope.city = data.city;
            $scope.state =  data.state;
            $scope.zone =  data.locality;

    });





}



$scope.viewAddress = function(id){
    
    
   $('#exampleModalScrollable').modal('toggle');
    
   $scope.fetchDataelight(id);
   $scope.fetchDataaddress(id);
  
    
};

$scope.addAddress = function(id){
    
    
   $('#exampleModalScrollable1').modal('toggle');
    
    $scope.hidden_id = id;
    $scope.submit_button = 'ADD ADDRESS';
};






   $scope.fetchDataaddress = function(id){
      
     $http.get('<?php echo base_url() ?>index.php/customer/fetch_data_address?id='+id).success(function(dataaddress){
      
      
       $scope.namesDataaddress = dataaddress;
      
       
     });
        
   };
   
   
   
   
   
   
   
   
   
   
   
    $scope.success = false;
  $scope.error = false;
   
   
   
   
   
   
   
   
   $scope.submitForm = function(){
      
       var ratings=  $('.ratingnum').text();
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/customer/addressadd",
       data:{'status':'1','zone':$scope.zone,'locality':$scope.locality,'google_map_link':$scope.google_map_link,'phone':$scope.phone,'city':$scope.city,'state':$scope.state,'pincode':$scope.pincode,'landmark':$scope.landmark,'address1':$scope.address1,'address2':$scope.address2,'name':$scope.name,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'customers_adddrss'}
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
              
                        $scope.locality ="";
                        $scope.name ="";
                        $scope.phone = "";
                        $scope.hidden_id = "";
                        $scope.address1 = "";
                        $scope.address2 = "";
                        $scope.landmark = "";
                        $scope.pincode = "";
                        $scope.zone = "";
                        $scope.city = "";
                        $scope.state = "";
                        $scope.google_map_link = "";
                       

                        $scope.success = true;
                        $scope.error = false;
                        $scope.successMessage = data.massage;
            
          

          }

          

      }

       
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
</body>



