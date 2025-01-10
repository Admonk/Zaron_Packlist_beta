<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <!-- twitter-bootstrap-wizard css -->
      <link rel="stylesheet" href="https://admonk.in/zaron_beta/assets/libs/twitter-bootstrap-wizard/prettify.css">
      <!-- preloader css -->
      <link rel="stylesheet" href="https://admonk.in/zaron_beta/assets/css/preloader.min.css" type="text/css" />
      <!-- Bootstrap Css -->
      <link href="https://admonk.in/zaron_beta/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="https://admonk.in/zaron_beta/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="https://admonk.in/zaron_beta/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
   </head>
   <body data-topbar="dark" data-layout="horizontal">
      <!-- <body data-layout="horizontal"> -->
      <!-- Begin page -->
      <div id="layout-wrapper">
         <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                  <!-- start page title -->
                  <div class="row">
                     <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <h4 class="mb-sm-0 font-size-18">Trip Management</h4>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Trips</a></li>
                                 <li class="breadcrumb-item active">Trip Orders</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end page title -->
                  <div class="row ">
                     <div class="col-lg-12">
                        <div class="driver-app-details">
                           <div class="card-header align-items-center d-flex">
                              <div class="flex-shrink-0">
                                 <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                                    <li class="nav-item">
                                       <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab" aria-selected="true">
                                       <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                       <span class="d-none d-sm-block">Open Trip</span> 
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab" aria-selected="false">
                                       <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                       <span class="d-none d-sm-block">Processing Trip</span> 
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab" aria-selected="false">
                                       <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                       <span class="d-none d-sm-block">Closed Trip</span>   
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <!-- end card header -->
                           <div class="mt-3">
                              <!-- Tab panes -->
                              <div class="tab-content text-muted">
                                 <div class="tab-pane active" id="home2" role="tabpanel" ng-init="fetchData_open()">
                                    
                                    <div class="card">
                                       <div class="card-body">
                                          <h5 class="card-title font-size-16 ng-binding border-bottom pb-2"><i class="mdi mdi-order-bool-ascending-variant font-size-20 pe-2"></i><b>Order ID </b>:SU120/2/2021 
                                             <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end ng-binding" id="task-status">Waiting</span>
                                          </h5>
                                          <p class=""><b class="ng-binding"><i class="mdi-road-variant mdi font-size-16"></i>Route Name : Coimbatore </b></p>
                                          <p class="mb-1 ng-binding">KONGUMAIN ROAD viswanathan  Tiruppur 641604</p>
                                          <p class="mb-0"><a href=""><u>View Map</u></a></p>
                                       </div>
                                       <div class="card-footer card-footer-bigtext">
                                           <span><i class=" fas fa-rupee-sign"></i>12,980.00</b></span>
                                           <button type="button" class="btn btn-success waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> <span>Start</span>
                                            </button>
                                       </div>
                                       <span class="badge bg-success card-badge-pos ms-1" style="position: absolute;top: -8px;left: 6px;">1</span>
                                    </div>
                                    
                                    <div class="card">
                                       <div class="card-body">
                                          <h5 class="card-title font-size-16 ng-binding border-bottom pb-2"><i class="mdi mdi-order-bool-ascending-variant font-size-20 pe-2"></i><b>Order ID </b>:SU120/2/2021 
                                             <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end ng-binding" id="task-status">Waiting</span>
                                          </h5>
                                          <p class=""><b class="ng-binding"><i class="mdi-road-variant mdi font-size-16"></i>Route Name : Coimbatore </b></p>
                                          <p class="mb-1 ng-binding">KONGUMAIN ROAD viswanathan  Tiruppur 641604</p>
                                          <p class="mb-0"><a href=""><u>View Map</u></a></p>
                                       </div>
                                       <div class="card-footer card-footer-bigtext">
                                           <span><i class=" fas fa-rupee-sign"></i>12,980.00</b></span>
                                           <button type="button" class="btn btn-success waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> Start
                                            </button>
                                       </div>
                                       <span class="badge bg-success card-badge-pos ms-1" style="position: absolute;top: -8px;left: 6px;">2</span>
                                    </div>
                                    
                                    
                                    <div class="card">
                                       <div class="card-body">
                                          <h5 class="card-title font-size-16 ng-binding border-bottom pb-2"><i class="mdi mdi-order-bool-ascending-variant font-size-20 pe-2"></i><b>Order ID </b>:SU120/2/2021 
                                             <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end ng-binding" id="task-status">Waiting</span>
                                          </h5>
                                          <p class=""><b class="ng-binding"><i class="mdi-road-variant mdi font-size-16"></i>Route Name : Coimbatore </b></p>
                                          <p class="mb-1 ng-binding">KONGUMAIN ROAD viswanathan  Tiruppur 641604</p>
                                          <p class="mb-0"><a href=""><u>View Map</u></a></p>
                                       </div>
                                       <div class="card-footer card-footer-bigtext">
                                           <span><i class=" fas fa-rupee-sign"></i>12,980.00</b></span>
                                           <button type="button" class="btn btn-success waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> Start
                                            </button>
                                       </div>
                                       <span class="badge bg-success card-badge-pos ms-1" style="position: absolute;top: -8px;left: 6px;">3</span>
                                    </div>
                                    
                                    
                                    <div class="card">
                                       <div class="card-body">
                                          <h5 class="card-title font-size-16 ng-binding border-bottom pb-2"><i class="mdi mdi-order-bool-ascending-variant font-size-20 pe-2"></i><b>Order ID </b>:SU120/2/2021 
                                             <span class="badge rounded-pill badge-soft-secondary font-size-11 float-end ng-binding" id="task-status">Waiting</span>
                                          </h5>
                                          <p class=""><b class="ng-binding"><i class="mdi-road-variant mdi font-size-16"></i>Route Name : Coimbatore </b></p>
                                          <p class="mb-1 ng-binding">KONGUMAIN ROAD viswanathan  Tiruppur 641604</p>
                                          <p class="mb-0"><a href=""><u>View Map</u></a></p>
                                       </div>
                                       <div class="card-footer card-footer-bigtext">
                                           <span><i class=" fas fa-rupee-sign"></i>12,980.00</b></span>
                                           <button type="button" class="btn btn-success waves-effect waves-light float-end">
                                                <i class="fas fa-truck font-size-18 align-middle me-2"></i> Start
                                            </button>
                                       </div>
                                       <span class="badge bg-success card-badge-pos ms-1" style="position: absolute;top: -8px;left: 6px;">4</span>
                                    </div>
                                    
                                    
                                   
                                            
                                            
                                 </div>
                                 <div class="tab-pane" id="profile2" role="tabpanel" ng-init="fetchData_process()">
                                    
                                 </div>
                                 <div class="tab-pane" id="messages2" role="tabpanel" ng-init="fetchData_closed()">
                                    <!-- ngRepeat: name in namesDataclosed -->
                                 </div>
                              </div>
                           </div>
                           <!-- end card-body -->
                        </div>
                        <!-- end card -->
                     </div>
                  </div>
                  <!-- end row -->
               </div>
               <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- Modal -->
         </div>
         <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
      <!-- Right Sidebar -->
      
      <!-- JAVASCRIPT -->
      <script src="https://admonk.in/zaron_beta/assets/libs/jquery/jquery.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/simplebar/simplebar.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/node-waves/waves.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/feather-icons/feather.min.js"></script>
      <!-- pace js -->
      <script src="https://admonk.in/zaron_beta/assets/libs/pace-js/pace.min.js"></script>
      <!-- twitter-bootstrap-wizard js -->
      <script src="https://admonk.in/zaron_beta/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
      <!-- form wizard init -->
      <script src="https://admonk.in/zaron_beta/assets/js/pages/form-wizard.init.js"></script>
      <script src="https://admonk.in/zaron_beta/assets/js/app.js"></script>
      
      <style>
          .driver-app-details p,.driver-app-details span
          {
              font-size:15px;
              font-weight:300;
          }
          
          .card-footer-bigtext span
          {
              font-size:18px;
              font-weight:bold;
              color: #ff6835;
          }
          
          .card-footer-bigtext i
          {
              padding-right:5px;
              font-size:18px;
          }
          .page-content
          {
              padding:0px !important;
              margin:0px !important;
          }
          
          .card-footer-bigtext button
          {
              font-size: 16px;
                font-weight: 500;
                padding: 5px 20px;
          }
          
          .card-footer-bigtext button span
          {
                animation: blink 1s linear infinite;
                font-size:16px;
                color:#fff;
                font-weight: 500;
          }
          
          @keyframes blink{
            0%{opacity: 0;}
            50%{opacity: .5;}
            100%{opacity: 1;}
            }

      </style>
   </body>
</html>