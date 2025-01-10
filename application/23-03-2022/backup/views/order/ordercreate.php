<?php 
include "header.php"; 
date_default_timezone_set("Asia/Kolkata"); 
 ?>
<style type="text/css">
   

</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

    <div id="layout-wrapper">
     <?php echo $top_nav; ?>
     
     
     
     
     
     
     
     
     
     
     
     
       <div class="main-content">
            <div class="page-content">
               <div class="container-fluid">
                   
                   
                         <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"></h4>
                                   

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                           <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> New Order</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        
                        
                  <div class="row">
                      
                      
                      
                      
                      
                      
                      
                     <div class="col-9">
                        <div class="row">
                            
                            <h4 class="mb-sm-0 font-size-18">New Order</h4>
                                    <p>create a new enquiry or Quotation</p>
                           <div class="col-lg-3">
                               
                               
                                <div class="card bg-primary border-primary text-white-50">
                                    <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id=<?php echo $neworder_id; ?>"> <div class="card-body">
                                       <h5 class="text-white"><i class=" fas fa-file-medical me-2 font-size-24"></i>New Enquiry</h5>
                                    </div>
                                     </a>
                                </div>
                            </div>


                            <div class="col-lg-3">
                                <div class="card bg-success border-success text-white-50">
                                     <a href="<?php echo base_url(); ?>index.php/order/ordercreate_product?order_id=<?php echo $neworder_id; ?>">
                                    <div class="card-body">
                                        <h5 class="text-white"><i class="fas fa-receipt me-2 font-size-24"></i>New Quotation</h5> 
                                    </div>
                                    </a>
                                </div>
                            </div>


                        </div>
                        
                     </div>
                     
                  </div>
               </div>
            </div>
            <!-- End Page-content -->
         </div>
     
     
     
     
     
     



   </div>
<?php include ('footer.php'); ?>
</body>


