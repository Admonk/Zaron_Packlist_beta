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
.viewmsg
{
    background: #fff !important;
    border: none;
    padding: initial;
    margin-top: 20px;
   
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
                                    
                                    <div class="mail-list mt-4" ng-init="fetchDatacount()">
                                        <a href="<?php echo base_url(); ?>index.php/ticket/inbox" ><i class="mdi mdi-email-outline me-2"></i> Inbox <span class="ms-1 float-end">{{countdata}}</span></a>
                                        <a href="<?php echo base_url(); ?>index.php/ticket/ticketcreate"><i class="mdi mdi-email-check-outline me-2"></i>Sent</a>
                                        <a href="<?php echo base_url(); ?>index.php/ticket/trash"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                                    </div>
        
                                 
                                </div>
                                <!-- End Left sidebar -->
        
        
                                <!-- Right Sidebar -->
                                <div class="email-rightbar mb-3">
                                    
                                    <div class="card">
                                        <div class="btn-toolbar gap-2 p-3" role="toolbar">
                                            <div class="btn-group">
                                                
                                                
                                               
                                                <!--<button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt" ng-click="Delete()"></i></button>-->
                                                <a href="javascript: void(0);" id="show-textbox" class="btn btn-primary waves-light waves-effect" data-bs-toggle="modal" data-bs-target="#composemodal"><i class="mdi mdi-reply me-1"></i> Reply</a>
               
                                           
                                           
                                            </div>
                                          
                                        
                                        </div>
                                        
                                        
                                        <div class="card-body" ng-init="fetchData()">
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded-circle avatar-sm" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-0">{{lable}} : {{username}}</h5>
                                                    <small class="text-muted">{{phone}}</small>
                                                </div>
                                                  <p class="pull-right" style="float: right;"><b>Date :</b> {{create_date}} <br><b>Priority :</b> 
                                                  
                                                        <span  ng-if="priority=='Low'" class="bg-success badge me-2" >{{priority}}</span>
                                                        <span  ng-if="priority=='High'" class="bg-danger badge me-2" >{{priority}}</span>
                                                        <span  ng-if="priority=='Medium'" class="bg-primary badge me-2" >{{priority}}</span>
                                                 
                                                  
                                                  
                                                  </p>


                                            </div>
                                            
                                            <input type="checkbox" id="chk10" class="chaeckboxset" style="display:none;" checked value="{{hidden_id}}">

                                            <h4 class="font-size-16">{{title}}</h4>

                                           
                                            
                                              <textarea class="form-control viewmsg" disabled   rows="12">{{message}} </textarea>
                                 

                                            
                                          

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
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                 


                                            
                             <div class="inner-message" ng-init="fetchData_sub()">


  <div ng-repeat="namess in namesDatasub">



                   <div class="check{{name.reply}}">


                      <p class="pull-right" style="float: right;"><b>Date :</b> {{namess.create_date}} </p>

                                            <div class="d-flex align-items-center mb-4">




                                                <div class="flex-shrink-0 me-3">
                                                    <img class="rounded-circle avatar-sm" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-0">{{namess.reply_set}} : {{namess.user}} </h5>
                                                    <small class="text-muted">{{namess.phone}}</small>
                                                    </div>
                                               </div>
                                               
                                               <textarea class="form-control viewmsg" disabled   rows="12">{{namess.message}} </textarea>
                                 
                                              
                                               

                                           <div class="row" ng-init="attachmentsub(namess.id)">
                                                <div class="col-xl-2 col-6" ng-repeat="nameimgsub in attachmentsub">
                                                    <div class="card">
                                                       
                                                     <span style="text-align: center;">  <i class="mdi mdi-file-pdf"></i> Attachemnt {{nameimgsub.id}} </span>
                                                        <div class="py-2 text-center">
                                                            <a href="{{nameimgsub.url}}" class="fw-medium" target="_blank">View</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                                <hr>

                   </div>     
                   
                  
                                            
                                           
    </div>


</div>


               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div> <!-- card -->
        
                                </div> <!-- end Col-9 -->
        
                            </div>
        
                        </div><!-- End row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
              
    </div>

 <div class="modal fade" id="composemodal" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-size-16" id="composemodalTitle">Reply Message</h5>
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
                            <label class="col-sm-12 col-form-label">Message</label>
                            <div class="col-sm-12">
                            
                               

                               <textarea class="form-control" name="message" required ng-model="messages" rows="8"> </textarea>
                                 


                              




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
                                 <input type="hidden" name="hidden_id" value="{{ticket_id}}">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Submit">Reply <i class="fab fa-telegram-plane ms-1"></i></button>
                            </div>
                                 </form>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            







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

  $scope.submit_button = 'Submit';
  
  
  
  
  

  
  
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
  
  

  $scope.fetchData_sub = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/fetchData_sub?id=<?php echo $id; ?>').success(function(data){
      $scope.namesDatasub = data;
    });
  };



 $scope.attachmentmain = function(){
    $http.get('<?php echo base_url() ?>index.php/ticket/attachmentmain?id=<?php echo $id; ?>').success(function(data){
      $scope.attachmentmain = data;
    });
  };

  $scope.attachmentsub = function(id){
    $http.get('<?php echo base_url() ?>index.php/ticket/attachmentsub?id='+id).success(function(data){
      $scope.attachmentsub = data;
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
            
            
            
            
            $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
                                                                    $(".alert-success").slideUp(500);
                                                                });
            
            
            
                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/ticket/fileuplaod_sub?id='+data.insert_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                   
                               });  

            
            
            
            
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



$scope.fetchDatacount = function(){
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/fetch_single_data_count",
      data:{'action':'fetch_single_data','tablename':'tickets'}
    }).success(function(data){

        $scope.countdata = data.countdata;
       
     
    });




 };


$scope.fetchData = function(){
    


    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'tickets','view':'<?php echo $view; ?>'}
    }).success(function(data){

        $scope.title = data.title;
        $scope.category = data.category;
        $scope.priority = data.priority;
        $scope.message = data.message;
        $scope.create_date = data.create_date;
        $scope.sataus = data.sataus;
        $scope.ticket_id = data.ticket_id;
        $scope.lable = data.lable;
        $scope.phone = data.phone;
        $scope.username = data.username;
        $scope.attachment = data.attachment;
        $scope.hidden_id = data.id;
     
    });




};






});

</script>
    <?php include ('footer.php'); ?>
</body>



