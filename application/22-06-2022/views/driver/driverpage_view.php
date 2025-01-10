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
        <link href="https://admonk.in/zaron_beta/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                        <div class="row driver-detail-page">
                                <div class="col-lg-12">
                                    <div class="card flexHeightCard">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Wizard with Progressbar</h4>
                                        </div>
                                        <div class="card-body">

                                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                                <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Seller Details">
                                                                <i class="bx bx-list-ul"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Company Document">
                                                                <i class="bx bx-book-bookmark"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="nav-item">
                                                        <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                            <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Bank Details">
                                                                <i class="bx bxs-bank"></i>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- wizard-nav -->

                                                <div id="bar" class="progress mt-4">
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                                </div>
                                                <div class="tab-content twitter-bs-wizard-tab-content">
                                                    <div class="tab-pane" id="progress-seller-details">
                                                        <div class="text-start mb-4">
                                                            <h5>Customer Details</h5>
                                                            
                                                            <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p class=""><span>SAKTHI BUILDERS</span>
                                                                  <span>Route: Coimbatore</span>
                                                                  <span>5/112 Tiruppur main road, Kaikattipudur post, Avinashi, Tamil Nadu 641654</span></p>
                                                                  <p class=""><span class="font-size-12">ZS224/17/2021</span><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></p>
                                                               </div>
                                                               <div class="time">
                                                                  <p><span>Started Time</span><span>10:25 a.m</span></p>
                                                                  <p><span>Est Arrival Time</span><span>1:05 p.m</span></p>
                                                               </div>
                                                               <div class="flight">
                                                                  <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d250577.849036318!2d76.98661947811352!3d11.092579967087119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d11.0231552!2d76.96875519999999!4m5!1s0x3ba9038baebcbb59%3A0x65ea405423a60cf4!2szaron%20industries!3m2!1d11.185958!2d77.28320699999999!5e0!3m2!1sen!2sin!4v1638435938932!5m2!1sen!2sin" style="border:0;width:100%; height:30vh;" allowfullscreen="" loading="lazy"></iframe>
                                                               </div>
                                                              </div>
                                                        </div>
                                                        <form>
                                                            
                                                        </form>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Reached Location <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="progress-company-document">
                                                      <div>
                                                        <div class="text-start mb-2">
                                                            <h5>Payment Details</h5>
                                                            <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p class=""><span>SAKTHI BUILDERS</span>
                                                                  <span>Route: Coimbatore</span>
                                                                  <span>5/112 Tiruppur main road, Kaikattipudur post, Avinashi, Tamil Nadu 641654</span></p>
                                                                  <p class=""><span class="font-size-12">ZS224/17/2021</span><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></p>
                                                               </div>
                                                               <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>Amount</span><span>19,500.00</span></p>
                                                               </div>
                                                               
                                                               <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                                            <button class="accordion-button fw-medium collapsed fw-medium" type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                               Product List
                                                                            </button>
                                                                        </h2>
                                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                                                            data-bs-parent="#accordionFlushExample">
                                                                            <div class="accordion-body p-1 text-muted">
                                                                                
                                                                                <div class="talbe-productList">
                                                                                          
                                                                                          <div class="table-responsive">
                                                                                            <table class="table mb-0">
                                                    
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>#</th>
                                                                                                        <th>First Name</th>
                                                                                                        <th>Last Name</th>
                                                                                                        <th>Username</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">1</th>
                                                                                                        <td>Mark</td>
                                                                                                        <td>Otto</td>
                                                                                                        <td>@mdo</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">2</th>
                                                                                                        <td>Jacob</td>
                                                                                                        <td>Thornton</td>
                                                                                                        <td>@fat</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">3</th>
                                                                                                        <td>Larry</td>
                                                                                                        <td>the Bird</td>
                                                                                                        <td>@twitter</td>
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
                                                        
                                                        <hr>
                                                        <form>
                                                            
                                                            
                                                            
                                                            <div class="row mt-3">
                                                                 <div class="col-lg-12">
                                                                     <label for="" class="form-label">Enter OTP</label>
                                                                </div>
                                                                  <div class="col-lg-2 col-3">
                                                                    <input type="text" class="form-control" id="">
                                                                  </div>
                                                                   <div class="col-lg-2 col-3">
                                                                    <input type="text" class="form-control" id="">
                                                                  </div>
                                                                   <div class="col-lg-2 col-3">
                                                                    <input type="text" class="form-control" id="">
                                                                  </div>
                                                                   <div class="col-lg-2 col-3">
                                                                    <input type="text" class="form-control" id="">
                                                                  </div>
      
                                                                  
                                                              </div>
                                                              
                                                              
                                                        </form>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i
                                                                        class="bx bx-chevron-right ms-1"></i></a></li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                    <div class="tab-pane" id="progress-bank-detail">
                                                        <div>
                                                            <div class="text-start mb-2">
                                                                <h5>Drop Details</h5>
                                                                <div class="ticket-inner">
                                                               <div class="route">
                                                                  <p class=""><span>SAKTHI BUILDERS</span>
                                                                  <span>Route: Coimbatore</span>
                                                                  <span>5/112 Tiruppur main road, Kaikattipudur post, Avinashi, Tamil Nadu 641654</span></p>
                                                                  <p class=""><span class="font-size-12">ZS224/17/2021</span><span><i class="mdi-phone mdi font-size-20 me-1"></i> Call Customer</span></p>
                                                               </div>
                                                               <div class="time">
                                                                  
                                                                  <p><span>Invoice</span><span class="font-size-13"><i class="mdi-download mdi pe-1"></i>Download</span></p>
                                                                  <p><span>Amount</span><span>19,500.00</span></p>
                                                               </div>
                                                              </div>
                                                            </div>
                                                          <form>
                                                              <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Payment mode</label>
                                                                        <select class="form-select">
                                                                            <option>Select</option>
                                                                            <option>Cash</option>
                                                                            <option>Cheque</option>
                                                                            <option>Bank Transfer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="example-text-input" class="form-label">Enter Cheque Number</label>
                                                                        <input class="form-control" type="text" value="Cheque Number" id="example-text-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                            
                                                          </form>
                                                          <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i
                                                                        class="mdi mdi-arrow-left me-1"></i> Previous</a></li>
                                                            <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" data-bs-toggle="modal"
                                                                    data-bs-target=".confirmModal"><i class="mdi mdi-thumb-up pe-1"></i>Mark as Trip Complete </a></li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            
                            
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <!-- Modal -->
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed'),document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="https://admonk.in/zaron_beta/assets/libs/jquery/jquery.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/node-waves/waves.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/feather-icons/feather.min.js"></script>
        
        <!-- Required datatable js -->
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        
        <!-- pace js -->
        <script src="https://admonk.in/zaron_beta/assets/libs/pace-js/pace.min.js"></script>
        <!-- twitter-bootstrap-wizard js -->
        <script src="https://admonk.in/zaron_beta/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
        <!-- form wizard init -->
        <script src="https://admonk.in/zaron_beta/assets/js/pages/form-wizard.init.js"></script>
        <!-- Responsive examples -->
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="https://admonk.in/zaron_beta/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="https://admonk.in/zaron_beta/assets/js/pages/datatables.init.js"></script>   
        <script src="https://admonk.in/zaron_beta/assets/js/app.js"></script>
        <style>
            .page-content
          {
              padding:0px !important;
              margin:0px !important;
          }
        </style>
    </body>
</html>
