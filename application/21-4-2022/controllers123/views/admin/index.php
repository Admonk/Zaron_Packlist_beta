<?php 
include "includes_auth/header.php";
?>









 <body data-topbar="dark">
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="m-auto w-50 p-5 border-grey ">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="<?php echo LOGO; ?>" alt="" height="28">
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue to Zaron.</p>
                                        </div>

<?php  if($this->session->flashdata('warning')){ ?><div class="alert alert-danger"><?php echo $this->session->flashdata('warning'); ?></div> <?php } ?>
<?php  if($this->session->flashdata('success')){ ?><div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div> <?php } ?>

                                        <form class="mt-4 pt-2" method="post"  action="<?php echo base_url(); ?>index.php/adminmain/login">  
                                            <div class="form-floating form-floating-custom mb-4">
                                                <input type="email" class="form-control" id="email" placeholder="Enther the Email" name="email">
                                                <label for="input-username">Email</label>
                                                <div class="form-floating-icon">
                                                   <i data-feather="users"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5" id="password-input" name="password" id="Password" placeholder="Password">
                                                
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="input-password">Password</label>
                                                <div class="form-floating-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check font-size-15">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <label class="form-check-label font-size-13" for="remember-check">
                                                            Remember me
                                                        </label>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>

<?php  include "includes_auth/footer.php"; ?>


      
    </body>




