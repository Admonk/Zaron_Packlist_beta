<?php  include "header.php"; ?>
<style type="text/css">
  
  a.tickets-card.row {
    border: #e9e9e9 solid 1px;
    padding: 20px;
    border-radius: 10px;
}
p {
    margin-top: revert;
    margin-bottom: 1rem;
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
                                    <h4 class="mb-sm-0 font-size-18">Ticket  List</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/ticket/ticketcreate">Ticket Create</a></li>
                                            <li class="breadcrumb-item active"> Ticket List </li>
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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                       
                                        <div class="flex-shrink-0">
                                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab">
                                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                        <span class="d-none d-sm-block">Open Tickets</span> 
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab">
                                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                        <span class="d-none d-sm-block">Processing Tickets</span> 
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab">
                                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                        <span class="d-none d-sm-block">Closed Tickets</span>   
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- end card header -->
                                    
                                    <div class="card-body">
                                       
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            
                                            
                                            
                                            <div class="tab-pane active" id="home2" role="tabpanel" ng-init="fetchData_open()">
                                               
                                                   
                       <div ng-repeat="name in namesData">
                      

                       
                        <a href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}"  target="_blank" class="tickets-card row">
                          <div class="tickets-details col-lg-8 col-12">
                            <div class="wrapper">
                              <h5>#{{name.ticket_id}} - {{name.category}}</h5>
                              
                            </div>


                            <div class="wrapper">
                             
                            
                              <p>Title  : {{name.title}}</p>
                             
                            </div>
                          </div>
                         
                          <div class="ticket-float col-lg-4 col-sm-8 d-none d-md-block">
                            <i class="category-icon mdi mdi-folder-outline"></i>
                            <span class="text-muted">{{name.priority}}</span>
                            <p><i class="mdi mdi-clock-outline"></i> {{name.create_date}}</p>
                          </div>
                        </a>

                         </div>
                         
                        <div ng-show="namesData.length==0">
                        <p> Ticket Not Found. </p>   
                         </div>
                               
                         
                                                
                                            </div>
                                            
                                            
                                            
                                            <div class="tab-pane" id="profile2" role="tabpanel" ng-init="fetchData_process()">
                                               
                                                    <div ng-repeat="name in namesDataprocess">
                      

                       
                        <a  href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}"  target="_blank" class="tickets-card row">
                          <div class="tickets-details col-lg-8 col-12">
                            <div class="wrapper">
                              <h5>#{{name.ticket_id}} - {{name.category}}</h5>
                              
                            </div>


                            <div class="wrapper">
                             
                            
                              <p>Title  : {{name.title}}</p>
                             
                            </div>
                          </div>
                         
                          <div class="ticket-float col-lg-4 col-sm-8 d-none d-md-block">
                            <i class="category-icon mdi mdi-folder-outline"></i>
                            <span class="text-muted">{{name.priority}}</span>
                            <p><i class="mdi mdi-clock-outline"></i> {{name.create_date}}</p>
                          </div>
                        </a>

                         </div>
                         
                         
                          <div ng-show="namesDataprocess.length==0">
                        <p> Ticket Not Found. </p>   
                         </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="tab-pane" id="messages2" role="tabpanel" ng-init="fetchData_closed()">
                                               
                                                    <div ng-repeat="name in namesDataclosed">
                      

                       
                        <a  href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}"  target="_blank" class="tickets-card row">
                          <div class="tickets-details col-lg-8 col-12">
                            <div class="wrapper">
                              <h5>#{{name.ticket_id}} - {{name.category}}</h5>
                              
                            </div>


                            <div class="wrapper">
                             
                            
                              <p>Title  : {{name.title}}</p>
                             
                            </div>
                          </div>
                         
                          <div class="ticket-float col-lg-4 col-sm-8 d-none d-md-block">
                            <i class="category-icon mdi mdi-folder-outline"></i>
                            <span class="text-muted">{{name.priority}}</span>
                            <p><i class="mdi mdi-clock-outline"></i> {{name.create_date}}</p>
                          </div>
                        </a>

                         </div>
                         
                         
                         
                           <div ng-show="namesDataclosed.length==0">
                        <p> Ticket Not Found. </p>   
                         </div>
                                               
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                        
                        </div><!-- end row -->















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

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.fetchData_open = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_open').success(function(data){
      $scope.namesData = data;
    });
  };

  $scope.fetchData_process = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_process').success(function(data){
      $scope.namesDataprocess = data;
    });
  };

  $scope.fetchData_closed = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_closed').success(function(data){
      $scope.namesDataclosed = data;
    });
  };


});

</script>
    <?php include ('footer.php'); ?>
</body>


