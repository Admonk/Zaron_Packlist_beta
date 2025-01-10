<?php  include "header.php"; ?>
<style>
a.titlestatus {
text-align: center;
margin: 0px 20px;
}
.no-msg
{
    text-align: center;
    background: #f5f5f5;
}
.bgcolorgray
{
   background: #f1f1f1;  
}
.bgcolorwhite
{
   background: #fff;  
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
                                    <h4 class="mb-sm-0 font-size-18">Ticket Inbox</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ticket</a></li>
                                            <li class="breadcrumb-item active">Ticket Inbox</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <!-- Left sidebar -->
                                <div class="email-leftbar card">
                                    <button type="button" class="btn btn-danger w-100 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#composemodal">
                                        Compose
                                    </button>
                                    <div class="mail-list mt-4" ng-init="fetchDatacount()">
                                        <a href="<?php echo base_url(); ?>index.php/ticket/inbox" class="active"><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">{{countdata}}</span></a>
                                        <a href="<?php echo base_url(); ?>index.php/ticket/ticketcreate" ><i class="mdi mdi-email-check-outline me-2"></i>Sent</a>
                                        <a href="<?php echo base_url(); ?>index.php/ticket/trash"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                                    </div>
        
                                 
                                </div>
                                <!-- End Left sidebar -->
        
        
                                <!-- Right Sidebar -->
                                <div class="email-rightbar mb-3">
                                    
                                    <div class="card">
                                        <div class="btn-toolbar gap-2 p-3" role="toolbar">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt" ng-click="Delete()"></i></button>
                                            </div>
                                          
            
                                            
                                            
                                            <div class="col-md-6">
                                            <div class="search-box position-relative">
                                                <input type="text" class="form-control" placeholder="Search..." ng-model="query[queryBy]">
                                                <i class="bx bx-search search-icon"></i>
                                            </div>
                                     </div>
                                        </div>
                                        <ul class="message-list"  ng-init="fetchData_sent()">
                                            
                                            <li ng-repeat="name in namesData | filter:query" >
                                                <div class="col-mail col-mail-1 {{name.bgcolor}}" >
                                                    <div class="checkbox-wrapper-mail">
                                                        <input type="checkbox" id="chk10" class="chaeckboxset" value="{{name.id}}">
                                                        <label for="chk10" class="toggle"></label>
                                                    </div>
                                                    <a href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}/0" class="titlestatus">{{name.lable}} : {{name.username}} {{name.replaycount}}</a>
                                                </div>
                                                <div class="col-mail col-mail-2 {{name.bgcolor}}" >
                                                    <a href="<?php echo base_url(); ?>index.php/ticket/ticket_view/{{name.id}}/0" class="subject">
                                                        
                                                        
                                                        <span  ng-if="name.priority=='Low'" class="bg-success badge me-2" >{{name.priority}}</span>
                                                        <span  ng-if="name.priority=='High'" class="bg-danger badge me-2" >{{name.priority}}</span>
                                                        <span  ng-if="name.priority=='Medium'" class="bg-primary badge me-2" >{{name.priority}}</span>
                                                        {{name.ticket_id}} -  {{name.title}} – 
                                                        <span class="teaser"> {{name.message}}</span>
                                                        
                                                        
                                                    </a>
                                                    <div class="date">{{name.dateset}}</div>
                                                </div>
                                            </li>
                                            
                                           <li ng-show="namesData.length==0" class="no-msg">
                                                <p> No Inbox history here. </p>   
                                           </li>
                                            
        
                                        </ul>
        
                                    </div> <!-- card -->
        
                                    <!--<div class="row">
                                        <div class="col-7">
                                            Showing 1 - 20 of 1,524
                                        </div>
                                        <div class="col-5">
                                            <div class="btn-group float-end">
                                                <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-sm btn-success waves-effect"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>-->
                                </div> <!-- end Col-9 -->
        
                            </div>
        
                        </div><!-- End row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-size-16" id="composemodalTitle">New Message</h5>
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
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Title</label>
                            <div class="col-sm-12">
                              <input id="title" class="form-control" name="title" required  ng-model="title" type="text">
                            </div>
                          </div>
                        </div>
                       
                      </div>
                      
                      
                      <div class="row">
                            <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Ticket Type</label>
                            <div class="col-sm-12">
                             <select class="form-control " required name="ticket_type"  id="ticket_type" ng-model="ticket_type">

                              <option value="1">Internal</option>
                              <option value="2">External</option>
                              
                              </select>
                            </div>
                          </div>
                        </div>
                       </div>
                       
                       
                       
                       
                       <div class="row" id="viewset">
                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">User Group</label>
                            <div class="col-sm-12">
                             <select class="form-control " ng-change='getUsres()'  name="user_group" id="user_group" ng-model="user_group">
                             <option value="0">Select User Group</option>
                                <?php 
                                
                                foreach($user_group as $val)
                                {
                                    
                                    if($val->id!=13)
                                    {
                                        
                                    
                                    ?>
                                     <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                                    <?php
                                    
                                    }
                                }
                                
                                ?>
                              
                              </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Select User</label>
                            <div class="col-sm-12">
                             <select class="form-control"  name="user" ng-model="user" ng-init="userlist(0)">

                              <option value="0">ALL</option>
                              
                            <option ng-repeat="namesp in productlistdata" value="{{namesp.id}}"> {{namesp.name}} </option>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                       </div>











                       <div class="row">
                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Category</label>
                            <div class="col-sm-12">
                             <select class="form-control " required name="category" ng-model="category">

                              <option value="">Select category</option>
                              <option value="General">General</option>
                              <option value="Technical">Technical</option>
                              <option value="Other">Other</option>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Priority</label>
                            <div class="col-sm-12">
                             <select class="form-control" name="priority" required ng-model="priority">

                              <option value="">Select priority</option>
                             <option value="Low" >Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                       </div>


                      


                     


                      <div class="row">

                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Message</label>
                            <div class="col-sm-12">
                            
                               

                               <textarea class="form-control" name="message" required ng-model="message" rows="8"> </textarea>
                                 


                              




                            </div>
                          </div>
                        </div>

                       
                      </div>

       


                      <div class="row">

                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Attachment (optional)</label>
                            <div class="col-sm-12">
                            
                               

                               <input type="file"  style="padding:9px;"  multiple file-input="files" class="form-control">
                              




                            </div>
                          </div>
                        </div>

                       
                      </div>



               

                            </div>
                            <div class="modal-footer">
                                 <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                            </div>
                                 </form>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            







        </div>
    </div>



<script>

var app = angular.module('crudApp', ['datatables']);
app.directive("fileInput", function($parse){  
                    return{  
                         link: function($scope, element, attrs){  
                              element.on("change", function(event){  
                                   var files = event.target.files;  
                                   $parse(attrs.fileInput).assign($scope, element[0].files);  
                                   $scope.$apply();  
                              });  
                         }  
                    }  
});  


app.controller('crudController', function($scope, $http){

  $scope.success = false;
  $scope.error = false;
  $scope.ticket_type = 1;
  $scope.user = 0;
$scope.user_group = "0";

  $scope.submit_button = 'Create';
  
  
  
  
  
  
  
   $scope.getUsres = function(){
     var user_group= $('#user_group').val();;
     
     $scope.userlist(user_group);
     
  }; 
  
  
  
  
   $scope.userlist = function (user_group) {
    
    
    
   
         $http({
          method:"POST",
          url:"<?php echo base_url() ?>index.php/ticket/userlist",
          data:{'user_group':user_group}
          }).success(function(data){
    
             $scope.productlistdata = data;
         
          });
          
      
}


  
  
  
    $scope.fetchData_sent = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_inbox').success(function(data){
        
        
         $scope.query = {}
      $scope.queryBy = '$';
        
        
      $scope.namesData = data;
    });
  };

  
  
  $scope.Delete = function(){
      
      
              var spiltparicel = $(".chaeckboxset");
               var order_product_id_set_value = [];
               for(var i = 0; i < spiltparicel.length; i++){
                  
                  if($(spiltparicel[i]).is(':checked')) {
                     order_product_id_set_value.push($(spiltparicel[i]).val());
                  }
                  else
                  {
                    order_product_id_set_value.push(0);
                  }
                 
               }
            
               var order_ticket_id= order_product_id_set_value.join("|");
               
               
                $http({
                method:"POST",
                url:"<?php echo base_url() ?>index.php/ticket/deletetticket",
                data:{'order_ticket_id':order_ticket_id}
                }).success(function(data){
                
                     $scope.fetchData_sent();  
                 
                }); 
              
               
      
  };
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $scope.fetchDatacount = function(){
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/fetch_single_data_count",
      data:{'action':'fetch_single_data','tablename':'tickets'}
    }).success(function(data){

        $scope.countdata = data.countdata;
       
     
    });




 };

  
  
  
  
  
  $scope.submitForm = function(){


      




    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/insertandupdate",
      data:{'title':$scope.title,'category':$scope.category,'ticket_type':$scope.ticket_type,'user_group':$scope.user_group,'user':$scope.user,'priority':$scope.priority,'message':$scope.message,'attachment':$scope.attachment,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'tickets'}
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
            $scope.title = "";
            $scope.message = "";
            $scope.attachment = "";
            $scope.successMessage = data.massage;


            $scope.ticket_type = 1;
            $scope.user = 0;
            $scope.user_group = "0";

           

                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/ticket/fileuplaod?id='+data.insert_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    $scope.fetchData_sent();  
                               });  


          

          }

          

      }

       
    });
  };




});

</script>
    <?php include ('footer.php'); ?>
</body>

<script type="text/javascript">
  
$(document).ready(function(){
  $("#ticket_type").click(function(){
       
       var val=$(this).val();
       if(val==1)
       {
           $('#viewset').show();
       }
       else
       {
           $('#viewset').hide();
       }
       
  });
});

</script>

