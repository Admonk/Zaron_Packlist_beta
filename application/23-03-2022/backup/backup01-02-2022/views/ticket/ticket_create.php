<?php  include "header.php"; ?>
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
                                    <h4 class="mb-sm-0 font-size-18">Ticket  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Ticket Forms</li>
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
                            <label class="col-sm-12 col-form-label">Category</label>
                            <div class="col-sm-12">
                             <select class="form-control ng-pristine ng-valid ng-touched" required name="category" ng-model="category">

                              <option value="">Select category</option>
                              <option value="General">General</option>
                              <option value="Technical">Technical</option>
                              <option value="Other">Other</option>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>

                       
                      </div>


                      


                      <div class="row">


                          <div class="col-md-12">
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





                      


                       <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                         <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">
                      
                    </form>





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



  $scope.submit_button = 'Create';

  $scope.submitForm = function(){


      




    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/ticket/insertandupdate",
      data:{'title':$scope.title,'category':$scope.category,'priority':$scope.priority,'message':$scope.message,'attachment':$scope.attachment,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'tickets'}
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





           

                               var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/ticket/fileuplaod?id='+data.insert_id, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                    $scope.select();  
                               });  


          

          }

          

      }

       
    });
  };




});

</script>
    <?php include ('footer.php'); ?>
</body>


