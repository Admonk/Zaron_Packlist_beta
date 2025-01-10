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
                                    <h4 class="mb-sm-0 font-size-18">Ledger List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/accountheads/accountheads_add">Ledger Form</a></li>
                                            <li class="breadcrumb-item active"> Ledger List </li>
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
                                        <h4 class="card-title">Ledger List Table</h4>
                                        
                    </div>
                    
                    
                                        
                    <div class="col-lg-12">
                         
                         <a href="<?php echo base_url(); ?>index.php/accountheads/accountheads_add" style="float: right;margin: 7px 20px;"  class="btn btn-primary waves-effect waves-light" >Add Ledger</a>
                    
                                            
                    </div>  










                    
                  <div class="card-body" >

                                             
                            <input type="hidden" id="nextnumber" value="10">   
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
                         
                          <th>Name</th>
                          <th>Phone </th>
                        
                          
                          <th style="width: 250px !important;display: flex;">Address</th>
                          <th style="width: 45px;">GST Status</th>
                          <th style="width: 45px;">GST</th>
                          <th>Opening Balance</th>  
                          <th></th>
                          <th>Action</th>
                         
                    </tr>
                </thead>

                <tbody>
                    <tr ng-repeat = "name in activity">
                         <td>{{name.no}}</td>
                          <td>{{name.company_name}}</td>
                          
                        
                          <td>{{name.phone}}</td>
                           
                          
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
                      
                            
                            




















                          
                        
                      
                      
                      
                       
                          <td style="display:flex;">
                          
                         
                          <a href="<?php echo base_url(); ?>index.php/accountheads/accountheads_edit/{{name.id}}"  target="_blank" class="btn btn-outline-primary"><i class="mdi mdi-pencil menu-icon"></i></a>
                          <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>
                         
                           
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
     $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.searchText + '&searchsales=' + $scope.salespersion)
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
         
         
         
         
         
     $http.get('<?php echo base_url() ?>index.php/accountheads/fetch_data?page_next=' + currentPage + '&size=' + pageSize + '&search=' + $scope.searchText + '&searchsales=' + $scope.salespersion)
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
      url:"<?php echo base_url() ?>index.php/accountheads/locality_list",
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











var keepGoing = true;
 
 $scope.changelocality = function(id){
     
     
     
     var locality=$('#dd_'+id).val();
     
     
 
     
     $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'locality':locality, 'action':'updatelocality','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'feedback':feedback, 'action':'updatefeedback','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
         data:{'id':id,'val':bb, 'action':'updatevalue','lab':'payment_status','obalance':obalance,'tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'payment_status','obalance':obalance,'tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'landline','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'customer_type','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'sales_team_id','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'gst_status','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'gst','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'credit_limit','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'val':bb, 'action':'updatevalue','lab':'credit_period','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_a','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_b','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_c','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id,'ratings':ratings,'action':'updateratings_d','tablename':'accountheads'}
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
        url:"<?php echo base_url() ?>index.php/accountheads/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'accountheads'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        getData();
      }); 
    }
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



