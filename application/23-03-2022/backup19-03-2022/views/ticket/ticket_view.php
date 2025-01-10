<?php  include "header.php"; ?>
<style type="text/css">
  .check0 {
 padding: 15px 65px;
}

.check1 {
 /*padding: 0px 45px;*/
}
form#ticketcreate {
     padding: 0px 65px;
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
                                    <h4 class="mb-sm-0 font-size-18">Ticket View  #{{ticket_id}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/ticket/ticket_history">Ticket List</a></li>
                                            <li class="breadcrumb-item active"> Ticket View </li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->




























<div class="card">
                                        <div class="btn-toolbar gap-2 p-3" role="toolbar">
                                            <div class="btn-group">

                           <?php
                           if($status==2)
                           {
                            ?>

                            <h4>Ticket has been closed.</h4>

                            <?php
                           }
                           else
                           {
                            ?>


<?php
                             if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                            {
                                
                             ?>

                                 <button type="button" ng-click="ticketclose(<?php echo $id; ?>)" class="btn btn-sm btn-outline-primary"><i class="mdi mdi-close text-primary"></i>Ticket Close</button>
                                 &nbsp;&nbsp;&nbsp;
 
                             <?php
                             
                             }
                                                        
                            ?>
                            
 
 
 
 
 
 
 
 
 
<button type="button" id="show-textbox"  class="btn btn-sm btn-outline-primary" ><i class="mdi mdi-reply me-1"></i> Reply</button>
               

                            <?php
                           }
                          ?>
                                              
                                               
                                            </div>
                                           
                                          

                                           
                                        </div>

                                        <div class="card-body" ng-init="fetchData()">
                                             <form class="cmxform" id="ticketcreate" ng-submit="submitForm()" method="post">

                                               <p class="pull-right" style="float: right;"><b>Date :</b> {{create_date}} <br><b>Priority :</b> {{priority}}</p>



                                            <div class="d-flex align-items-center mb-4">




                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded-circle avatar-sm" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-0">User </h5>
                                                    
                                                    <!-- <small class="text-muted">support@domain.com</small> -->
                                                </div>
                                            </div>

                                            <h4 class="font-size-16">Category : {{category}}</h4>

                                            <p>Hi Team,</p>
                                            <p>{{message}}
                                            </p>
                                            
                                          

                                            <div class="row" ng-init="attachmentmain()">
                                                <div class="col-xl-2 col-6" ng-repeat="nameimg in attachmentmain">
                                                    <div class="card">
                                                       
                                                     <span style="text-align: center;">  <i class="mdi mdi-file-pdf"></i> Attachemnt {{nameimg.id}} </span>
                                                        <div class="py-2 text-center">
                                                            <a href="{{nameimg.url}}" class="fw-medium" target="_blank">View</a>
                                                        </div>
                                                    </div>
                                                </div>



                                               
                                            </div>



  <hr>






                     <div class="row" style="display: none" id="showbox">

                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Message</label>
                            <div class="col-sm-12">
                            
                               

                               <textarea class="form-control ng-pristine ng-valid ng-touched" name="messages" ng-model="messages" rows="8"> </textarea>
                                 


                              <br>

                                               
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

                            </div>
                          </div>


                          <input type="hidden" name="hidden_id" value="{{ticket_id}}">
                         <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="Submit">



                        </div>


                       
                      </div>











<div class="inner-message" ng-init="fetchData_sub()">


  <div ng-repeat="name in namesData">



                   <div class="check{{name.reply}}">


                      <p class="pull-right" style="float: right;"><b>Date :</b> {{name.create_date}} </p>

                                            <div class="d-flex align-items-center mb-4">




                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded-circle avatar-sm" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-0">{{name.user}} </h5>
                                                    
                                                   
                                                </div>
                                            </div>

                                          

                                            <p> {{name.reply_set}}</p>
                                            <p>{{name.message}}</p>
                                            

                   </div>     
                   
                   <hr></hr>
                                            
                                           
    </div>


</div>








                    




























                                        </div>












































































                                    </div>



















                                 
                        
                    </div>
                    <!-- container-fluid -->


                </div>
                <!-- End Page-content -->

            
</form>






        </div>
    </div>



  
<script>

var app = angular.module('crudApp', ['datatables']);
app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Submit';



  $scope.fetchData_sub = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_sub?id=<?php echo $id; ?>').success(function(data){
      $scope.namesData = data;
    });
  };



 $scope.attachmentmain = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/attachmentmain?id=<?php echo $id; ?>').success(function(data){
      $scope.attachmentmain = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/insertandupdate",
      data:{'message':$scope.messages,'reply':'0','username':$scope.username,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'tickets_sub'}
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

            $scope.success = true;
            $scope.error = false;
            $scope.messages = "";
           
            $scope.successMessage = data.massage;
            $scope.fetchData_sub();
          

          }

          

      }

       
    });
  };








$scope.ticketclose = function(id){
    if(confirm("Are you sure you want to close ticket it?"))
    {
          $http({
            method:"POST",
            url:"<?php echo base_url() ?>index.php/ticket/insertandupdate",
            data:{'id':id, 'action':'Close','tablename':'tickets'}
          }).success(function(data){
            
                 
                 location.reload();



          }); 
    }
};



$scope.fetchData = function(){
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'tickets'}
    }).success(function(data){

        $scope.title = data.title;
        $scope.category = data.category;
        $scope.priority = data.priority;
        $scope.message = data.message;
        $scope.create_date = data.create_date;
        $scope.sataus = data.sataus;
        $scope.ticket_id = data.ticket_id;
        $scope.attachment = data.attachment;
        $scope.hidden_id = data.id;
     
    });




};








});

</script>

    <?php include ('footer.php'); ?>
</body>


<script type="text/javascript">
  
$(document).ready(function(){
  $("#show-textbox").click(function(){
    $('#showbox').toggle();
  });
});

</script>
