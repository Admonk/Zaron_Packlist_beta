<?php  include "includes_auth/header.php"; ?>
<style type="text/css">
    label {
    margin-top: 17px;
    margin-bottom: .5rem;
    font-weight: 500;
}

</style>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">


    <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            
                             
                            <div class="m-auto w-50 p-5 border-grey ">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="#" class="d-block auth-logo">
                                            <img src="<?php echo LOGO; ?>" alt="" height="28">
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Customer Login !</h5>
                                            
                                        </div>

<?php  if($this->session->flashdata('warning')){ ?><div class="alert alert-danger"><?php echo $this->session->flashdata('warning'); ?></div> <?php } ?>
<?php  if($this->session->flashdata('success')){ ?><div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div> <?php } ?>

                                        <form class="mt-4 pt-2" method="post"  action="<?php echo base_url(); ?>index.php/adminmain/customerlogin">  
                                            

                                            <div class="">
                                                <label><i data-feather="user"></i> User ID</label>

                                                <input type="text"  class="form-control" required ng-keypress="validation($event)"   name="user_id" id="user_id" autocomplete="off" placeholder="Enter The User ID"> 
                                               
                                                 
                                            </div>


                                           
            
                                             <div id="show-new-password" style="display: none;">   
                                            <div class="">

                                                <label><i data-feather="lock"></i> New Password</label>

                                                <input type="text"  class="form-control pe-5"  required name="newpassword" id="newpassword" autocomplete="off" placeholder="New Password"> 
                                               
                                              

                                            </div>


                                            <div class="">

                                                <label><i data-feather="lock"></i> Confirm Password</label>

                                                <input type="text"  autocomplete="off" class="form-control pe-5" required ng-blur="passwordcheck()"  name="conpassword" id="conpassword" placeholder="Confirm Password"> 
                                               
                                              

                                            </div>
                                            </div>

                                              <div id="show-password" style="display: none;"> 


                                                <div class="">
                                                <label><i data-feather="lock"></i> Password</label>

                                                <input type="password"  autocomplete="off" class="form-control pe-5" required  name="password" id="password" placeholder="Enter The Password"> 
                                               
                                                

                                            </div>


                                              </div>


 <p style="color: red;text-align: right;font-family: cursive;">{{msg}}</p>


                                            
                                            <div class="mb-3" id="show-login-btn" style="display: none;">
                                                <button class="btn btn-success w-100 waves-effect waves-light" type="submit">Log In</button>
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



<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){


 
$scope.passwordcheck = function () 
{

 

      var newpassword=$('#newpassword').val();
      var conpassword=$('#conpassword').val();


      if(newpassword==conpassword)
      {

        
           $scope.msg = '';
           $('#conpassword').css('border-color','none'); 
           $('#show-login-btn').show();

      }
      else
      {


           $scope.msg = 'Confirm password not match message';
           $('#conpassword').css('border-color','red'); 
           $('#show-login-btn').hide();


      }



};

$scope.validation = function (event) 
{


if(event==13)
{
    var eventset=13;
}
else
{
    var eventset=event.keyCode;
}

if(eventset==13)
{
  

                    var user_id=$('#user_id').val();

                    if(user_id!='')
                    {

                              
                                  $http({
                                  method:"POST",
                                  url:"<?php echo base_url() ?>index.php/adminmain/check_customer_validation",
                                  data:{'user_id':user_id}
                                  }).success(function(data){
                                   if(data.status==0)
                                   {
                                      $scope.msg = data.message;
                                      $('#user_id').css('border-color','red');   
                                   }

                                    if(data.status==1)
                                   {
                                      $scope.msg = '';

                                      $('#show-new-password').show();
                                      $('#show-password').hide();
                                      $('#show-login-btn').show();

                                      $('#newpassword').attr('required',true);
                                      $('#conpassword').attr('required',true);
                                      $('#password').attr('required',false);

                                      $('#user_id').css('border-color','none');   
                                   }

                                   if(data.status==2)
                                   {
                                      $scope.msg = '';
                                       $('#show-new-password').hide();
                                      $('#show-password').show();
                                      $('#show-login-btn').show();

                                      $('#newpassword').attr('required',false);
                                      $('#conpassword').attr('required',false);
                                      $('#password').attr('required',true);

                                      $('#user_id').css('border-color','none');   
                                   }
                                   
                                   
                                  });



                                    
                    
                    }
                    else
                    {

                                      $('#user_id').css('border-color','red');   
                                      $('#show-new-password').hide();
                                      $('#show-password').hide();
                                      $('#show-login-btn').hide();
                    

                    }
}   
    
};





});

</script>
   <?php  include "includes_auth/footer.php"; ?>
</body>

