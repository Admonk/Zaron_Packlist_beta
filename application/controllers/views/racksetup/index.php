<?php  include "header.php"; ?>
<style>
    .col-sm-7 {
    width: 100%;
}
    .tooltip {
  position: relative;
  display: contents;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
      visibility: hidden;
    /* width: 120px; */
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 90%;
    /* left: 50%; */
    /* margin-left: -60px; */
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 23%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
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
                                    <h4 class="mb-sm-0 font-size-18">Rack & Bin SetUp Form</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Rack & Bin SetUp Form</li>
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

                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Storage name
                           
                           
                           </label>
                           
                            <div class="tooltip">
                                    <i class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" ></i>
                                   <span class="tooltiptext">Select the storage type and proceed with the Rack and bin setup to add a virtual rack and bin setup</span>
                           </div>
                           
                            <div class="col-sm-7">
                              
 <select class="form-control" required name="stroage_name"  ng-model="stroage_name">

                              <option value=""> Select Storage</option>

                              <?php
                                foreach ($storage as $value) {

                                  ?>
                                       <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Rack String with ( , ) : A,B,C or 1,2,3</label>
                            <div class="col-sm-7">
                              <input id="rack" class="form-control" required  ng-model="rack" name="rack" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Bin Row count:</label>
                            <div class="col-sm-7">
                              <input id="bin_row" class="form-control" required  ng-model="bin_row" name="bin_row" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Bin column count:</label>
                            <div class="col-sm-7">
                              <input id="bin_col" class="form-control" required  ng-model="bin_col" name="bin_col" type="text">

                            </div>
                          </div>
                        </div>

                       <div class="col-md-6">
                         
                        </div>

                       <div class="col-md-6">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                <br>
                                 <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                                 <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="{{submit_button}}">
   
                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>





<hr></hr>
<h4 class="mb-sm-0 font-size-18">Rack  List</h4>      
<br>
                       


                    <div  ng-init="fetchData()">
                
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" datatable="ng" dt-options="vm.dtOptions" >
                      <thead>
                        <tr>


                         <th>ID #</th>
                         <th>Storage Name</th>
                         <th>Rack</th>
                         <th>Bin Row Count</th>
                         <th>Bin Column Count</th>
                         <th>Action</th>
            
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="name in namesData">
                          <td>{{name.no}}</td>
                          <td>{{name.stroage_name}}</td>
                          
                          <td>{{name.rack}}</td>
                          <td>{{name.bin_row}}</td>
                          <td>{{name.bin_col}}</td>
                          
                         
                          <td>
                            <button type="button" ng-click="fetchSingleData(name.id)" class="btn btn-outline-primary">Edit</button>



 


                        <?php
                        // Shop Team
                        $usergroup=array(1,2); 
                        if(in_array($this->session->userdata['logged_in']['access'],$usergroup))
                        {
                                                        
                        ?> 

                           <button type="button" ng-click="deleteData(name.id)" class="btn btn-outline-danger"><i class="mdi mdi-delete menu-icon"></i></button>

                           
                        <?php
                        }
                        ?>

                         </td>
                        </tr>
                        
                      
                      </tbody>
                    </table>
                 
                  </div>




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



  $scope.submit_button = 'Add';


  $scope.fetchData = function(){
    $http.get('<?php echo base_url() ?>index.php/racksetup/fetch_data').success(function(data){
      $scope.namesData = data;
    });
  };

 
 
  $scope.submitForm = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/racksetup/insertandupdate",
      data:{'stroage_name':$scope.stroage_name,'rack':$scope.rack,'bin_col':$scope.bin_col,'bin_row':$scope.bin_row,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'racksetup'}
    }).success(function(data){
       
      if(data.error != '1')
      {
        $scope.success = true;
        $scope.error = false;
        $scope.stroage_name = "";
        $scope.hidden_id = "";
        $scope.successMessage = "Racksetup  successfully "+$scope.submit_button;
        $scope.fetchData();
      }



    });
  };


$scope.fetchSingleData = function(id){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/racksetup/fetch_single_data",
      data:{'id':id, 'action':'fetch_single_data','tablename':'racksetup'}
    }).success(function(data){
      $scope.stroage_name = data.stroage_name;
      $scope.hidden_id = id;
      
      $scope.rack = data.rack;
      $scope.bin_row = data.bin_row;
      $scope.bin_col = data.bin_col;
    
      
      $scope.submit_button = 'Update';
     
    });
};



$scope.deleteData = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/racksetup/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'racksetup'}
      }).success(function(data){
        $scope.success = false;
        $scope.error = false;
        $scope.fetchData();
      }); 
    }
};




});

</script>
    <?php include ('footer.php'); ?>
</body>


