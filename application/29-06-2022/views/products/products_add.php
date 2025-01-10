<?php include "header.php"; ?>
<style>
#dis_acc {
    line-height: 40px;
}

 canvas {
         display: block;
         touch-action: none;
         width: 1120px !important;
         padding: 12px;
         }
         

         div#canvas {
            margin: 18px 0px;
        }
         
         fieldset > * {
         display: inline-block;
         vertical-align: middle;
         }
         legend {
         font-weight: bold;
         font-size: 1.5rem;
         }
        
         input[type=color] {
         height: 0;
         position: absolute;
         top: -800px;
         width: 0;
         }
         .toolbar {
         color: var(--primary);
         display: flex;
         flex-wrap: wrap;
         left: 0;
         position: absolute;
         top: 0;
         width: 100%;
         display: none;
         }
         .toolbar__group {
         background-color: rgba(0, 0, 0, 0.85);
         flex-grow: 1;
         padding: 10px 15px 20px;
         }
         .toolbar__heading {
         margin-bottom: 0.5em;
         }
         .toolbar__option {
         margin-right: 1rem;
         }
         .toolbar__button {
         --dimension: 3rem;
         border: 1px solid currentColor;
         color: var(--static);
         cursor: pointer;
         display: inline-block;
         height: var(--dimension);
         line-height: 1;
         position: relative;
         overflow: hidden;
         text-indent: 60px;
         vertical-align: middle;
         width: var(--dimension);
         }
         .toolbar__button::before {
         background-color: currentColor;
         content: "";
         display: block;
         left: 50%;
         position: absolute;
         top: 50%;
         }
         .toolbar__option--color .toolbar__button {
         border: none;
         }
         .toolbar__button[for=line]::before {
         height: 70%;
         transform: translate(-50%, -50%) rotate(45deg);
         width: 2px;
         }
         .toolbar__button[for=rectangle]::before {
         height: 45%;
         transform: translate(-50%, -50%);
         width: 45%;
         }
         .toolbar__button[for=circle]::before {
         border-radius: 100%;
         height: 50%;
         transform: translate(-50%, -50%);
         width: 50%;
         }
         .toolbar__button[for=polygon]::before {
         background-color: transparent;
         border-bottom: 1.3rem solid currentColor;
         border-left: 0.75rem solid transparent;
         border-right: 0.75rem solid transparent;
         display: block;
         height: 0;
         transform: translate(-50%, -54%);
         width: 0;
         }
         input:checked + .toolbar__button {
         background-color: #777;
         color: var(--active);
         }
         .toolbar__label {
         margin-right: 0.5rem;
         }
         .toolbar__sub-group {
         margin-left: 1rem;
         opacity: 0.3;
         }
         input:checked + .toolbar__button + .toolbar__sub-group {
         opacity: 1;
         }
         #clear {
         position: absolute;
         right: 30px;
         top: 10px;
         }
         #saveServer
         {
         position: absolute;
         right: 100px;
         top: 10px;
         }
         #pristine-valid-common2 .row .col-md-12 {
             /* line-height: 44px; */
             margin-bottom: 14px;
         }
         
         .row.showdata {
    margin-bottom: 10px;
    margin-top: 10px;
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
                                    <h4 class="mb-sm-0 font-size-18">Product  Create</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item active"> Product Forms !</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

     

                                    <div class="row">
                                        
                                           
                 
              <div class="col-lg-12">
                  
               
                <div class="card">
                 

                    <div class="card-header1">
                                       
                                        
      <a href="#" class="btn btn-success"  data-bs-toggle="modal" data-bs-target=".exampleModalToggleLabel" style="float:right;margin: 5px 10px;">Add new field</a>
  
                                    </div>
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



                                        









                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post" enctype="multipart/form-data">
                    



                       <div class="row">
                           
                           
                            <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Categories <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                               <select class="form-control categories" required name="categories"  ng-model="categories">

                              <option value=""> Select Categories</option>

                              <?php
                                foreach ($Categories as $value) {

                                  ?>
                                       <option value="<?php echo $value->categories; ?>" data-id="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                             <label class="col-sm-12 col-form-label">Fact   </label>
                            <div class="col-sm-12">
                              <input id="formula" class="form-control" required name="formula" ng-model="formula" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                         <div class="col-md-3" id="formula2" style="display:none">
                          <div class="form-group row">
                             <label class="col-sm-12 col-form-label">Fact No 2   <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="kg_formula" class="form-control" required name="formula2" ng-model="formula2" type="text">
                            </div>
                          </div>
                        </div>
                      
                        
                        
                        
                          <div class="col-md-2" style="display:none;">
                          <div class="form-group row">
                                 <label class="col-sm-12 col-form-label">Product name Builder <span style="color:red;">*</span></label>
                           
                            <div class="col-sm-12">
                             <input id="source_name" class="form-control" name="source_name" placeholder="First Name"  required ng-model="source_name" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                                 <?php
                        
                        foreach($additional_information1 as $vvl)
                        {
                            
                            
                                    $required=$vvl->required;
                                    $rrs="";
                                    $span="";
                                    if($required==1)
                                    {
                                        $rrs="required";
                                        $span='<span style="color:red;">*</span>';
                                    }
                            
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-3 fisrtfind <?php echo "set_".$vvl->category_id; ?>" style="display:none;">
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                            <select  class="form-control <?php echo strtolower($vvl->label_name); ?>" <?php echo $rrs; ?>  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                             
                                                             <option value="">Select <?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></option>
                                                             
                                                              <?php
                                                              for ($i=0; $i <count($option) ; $i++)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $option[$i] ?>"><?php echo $option[$i] ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>
                            <?php
                            
                                     }
                                     else
                                     {
                                         
                                         $tpebase= $vvl->type;
                                         
                                         if($tpebase=='Date')
                                         {
                                             $vv='date';
                                         }
                                         else
                                         {
                                             $vv='text';
                                         }
                                         
                                         ?>
                                         
                                           <div class="col-md-3 fisrtfind <?php echo "set_".$vvl->category_id; ?>" style="display:none;">
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" <?php echo $rrs; ?> class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                        
                        
                        
                        
                        
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">UOM</label>
                            <div class="col-sm-12">
                              <select class="form-control" name="uom"  ng-model="uom">

                              <option value=""> Select UOM</option>

                              <?php
                                foreach ($uom as $value) {

                                  ?>
                                       <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <h4 class="card-title mt-3">Price Details </h4>
                        
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control price" name="price"   required ng-model="price" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        <div class="col-md-5" >
                         
                         
                          <div class="form-group row">
                           <label class="col-sm-12 col-form-label">Price Type <span style="color:red;">*</span></label>
                    <select class="form-control price_type" name="price_type"  ng-model="price_type">

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                          <?php
                                                          
                                                        }
                                                      ?>
                                                    
                                                      
                         </select>
                         </div>
                        </div>
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                          
                            <label class="col-sm-12 col-form-label">&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-12">
                               <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_rowprice();"><i class="fa fa-plus" ></i></button>

                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                      </div>
                      
                      
                      
                      
                      
                       <div id="price_details" style="display:none;"></div>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       


                        <div class="row">
                            
                            
                            
                             <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Actual Stock</label>
                            <div class="col-sm-12">
                              <input id="stock" class="form-control" name="stock"  ng-model="stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Stock On Hold</label>
                            <div class="col-sm-12">
                              <input id="optimal_stock" class="form-control" name="optimal_stock"  ng-model="optimal_stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Stock In Production</label>
                            <div class="col-sm-12">
                              <input id="optimal_stock" class="form-control" name="production_stock"  ng-model="production_stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Min Order QTY</label>
                            <div class="col-sm-12">
                              <input id="optimal_stock" class="form-control" name="min_order_stock"  ng-model="min_order_stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                            
                            
                            
                            
                            
                  
                        
                        
                        
                        
                        <?php
                        
                        foreach($additional_information as $vvl)
                        {
                            
                                    $required=$vvl->required;
                                    $rrs="";
                                    $span="";
                                    if($required==1)
                                    {
                                        $rrs="required";
                                        $span='<span style="color:red;">*</span>';
                                    }
                            
                            
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-3" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control <?php echo strtolower($vvl->label_name); ?>" <?php echo $rrs; ?>  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                            
                                                               <option value="">Select <?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></option>
                                                            
                                                              <?php
                                                              for ($i=0; $i <count($option) ; $i++)
                                                              { 

                                                              ?>
                                                                    <option value="<?php echo $option[$i] ?>"><?php echo $option[$i] ?></option>
                                                              
                                                              <?php
                                                              
                                                              }

                                                              ?>
                                                            </select>
                                                           
                                                         </div>
                                                    
                                                   </div>
                                             
                                                
                                            </div>
                            <?php
                            
                                     }
                                     else
                                     {
                                         
                                         $tpebase= $vvl->type;
                                         
                                         if($tpebase=='Date')
                                         {
                                             $vv='date';
                                         }
                                         else
                                         {
                                             $vv='text';
                                         }
                                         
                                         ?>
                                         
                                           <div class="col-md-3" >
                                              
                                              
                                                   <div class="form-group row">
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?> <?php echo $span; ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" <?php echo $rrs; ?> class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
                                                         </div>
                                                      
                                                   </div>
                                                
                                                
                                                
                                            </div>
                                         
                                         <?php
                                     }
                            
                        }
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      </div>



                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">HSN SAC</label>
                            <div class="col-sm-12">
                              <input id="HSN_SAC" class="form-control" name="HSN_SAC"  ng-model="HSN_SAC" type="text">
                            </div>
                          </div>
                        </div>
                     
                        
                        
                        

                        
                          
                        
                        
                        
                        
              
                        
                        
                        <div class="col-md-6" style="display:none">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Current Stock</label>
                            <div class="col-sm-12">
                              <input id="brand" class="form-control" name="side_label"  ng-model="side_label" type="text" >
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Image </label>
                            <div class="col-sm-12">
                            
                               

                               <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Draw Image</a>
                               
                                <div id="img" style="display:none;">
                                <img src="" id="newimg" class="top" style="width: 60%;" />
                                </div>



                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Upload Image <small>(multiple)</small></label>
                            <div class="col-sm-12">
                            
                               

                             <input type="file"  style="padding:9px;"  multiple file-input="files" class="form-control">
                              

                            </div>
                          </div>
                        </div>
                        
                             
                                                
                        
                          <div id="dis_acc" style="display:none;">
                            
                          
                          
                          
                          
                          
                          
                           <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Calculation Type</label>
                            <div class="col-sm-12">
                                
                              <select class="form-control" name="type"  ng-model="type">

                              <option value="0"> Select Type</option>

                              <option value="1">Accesories Type 1</option>
                              <option value="2">Accesories Type 2</option>
                              <option value="3">Accesories Type 3</option>
                              <option value="4">Tiles Type 4</option>
                              <option value="5">Decking sheet Type 5</option>
                              <option value="6">Aluminium Type 6</option>
                              <option value="7">(Purlin Or Sag Rod Or Polynum) Type 7</option>
                              <option value="8">Profile ridge & Arch Type 8</option>
                              <option value="9">Screw Or UPVC Type 9</option>
                              <option value="10">Polycarbonate Type 10</option>
                              <option value="11">L angle Type 11</option>
                              <option value="12">Z angle Type 12</option>
                              <option value="14">Z angle Type 14</option>
                              <option value="15">Multiwall Type 15</option>
                              
                              <option value="16">Liner Sheets 16</option>
                              <option value="17">Roll Sheet 17</option>
                              <option value="18">Rent Bill 18</option>
                               <option value="19">Steel Coil 19</option>
                              
                              </select>
                             
                            </div>
                          </div>
                        </div>
                     
                          
                          
                          
                          
                          
                          
                         <div class="row" style="display:none;">  
                        <h4 class="card-title mt-3">Sizes </h4>
                        
                        
                      
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input  class="form-control label1" placeholder="A" name="label1[]" ng-model="label1" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              +
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input  class="form-control label2" placeholder="Number" name="label2[]" ng-model="label2" type="text">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-3" style="display:none;">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                             <select class="form-control point" name="point[]"  ng-model="point">

                              <option value="">Select Point</option>
                              <option value="1">Top ot Bottom</option>
                              <option value="2">Bottom ot Top</option>
                              <option value="3">Right ot Left</option>
                              <option value="4">Left ot Right</option>

                              
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                         <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                               <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_row();"><i class="fa fa-plus" ></i></button>

                            </div>
                          </div>
                        </div>
                        
                        </div>
                         <div id="show_details" style="display:none;"></div>
                         <div class="row" style="display:none;">  
                        <h4 class="card-title mt-3">Sizes Options </h4>
                        
                        
                      
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input  class="form-control label_option1" placeholder="number" name="label_option1[]" ng-model="label_option1" type="number">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-1">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              +
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input  class="form-control label_option2" placeholder="number" name="label_option2[]" ng-model="label_option2" type="number">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                         <div class="col-md-1">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                             
                            </div>
                          </div>
                        </div>
                         <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                               <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_row_option();"><i class="fa fa-plus" ></i></button>

                            </div>
                          </div>
                        </div>
                        
                        </div>
                         <div id="show_details2"></div>
                          
                         
                        </div>
                    

                        <div class="col-md-12" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Description</label>
                            <div class="col-sm-12">
                             <textarea id="description" class="form-control" name="description" ng-model="description" rows="6" ></textarea>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-md-12" >
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-12">
                                
                                  <div class="form-check">
                                  <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" ng-model="link_to_purchase"  id="link_to_purchase" value="1" checked> Link with Purchase module PO generation <i class="input-helper"></i></label>
                                 </div>
                                
                            
                            
                            </div>
                          </div>
                        </div>
                        
                        
                        
                       
                        
                        
                      

                    
                        
                         <div class="col-md-12 mt-4">
                          <div class="form-group flaot-end text-end">
                              <input type="hidden" name="hidden_id" value="{{hidden_id}}" />
                              <input class="btn btn-success w-lg btn-rounded waves-effect waves-light" type="submit" value="{{submit_button}}">
                            </div>
                        </div>



                      </div>



                       






                      


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






  <!-- Modal Draw Image-->
<div class="modal fade bs-example-modal-xl" id="imagesizemodel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Draw Image</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                  <ul class="toolbar">
                                             <li class="toolbar__group">
                                                <fieldset>
                                                   <legend class="toolbar__heading">Tools</legend>
                                                   <input id="line" type="radio" name="tools" value="line" checked="checked"/>
                                                   <label class="toolbar__button" for="line"><span>Line</span></label>
                                                   <div style="display: none;">
                                                      <input id="rectangle" type="radio" name="tools" value="rectangle"/>
                                                      <label class="toolbar__button" for="rectangle"><span>Rectangle</span></label>
                                                      <input id="circle" type="radio" name="tools" value="circle"/>
                                                      <label class="toolbar__button" for="circle"><span>Circle</span></label>
                                                      <input id="polygon" type="radio" name="tools" value="polygon"/>
                                                      <label class="toolbar__button" for="polygon"><span>Polygon</span></label>
                                                      <div class="toolbar__sub-group">
                                                         <label class="toolbar__label" for="sides">Polygon Sides:</label>
                                                         <input id="sides" type="number" min="3" max="10" value="3" data-setting="polygonSides"/>
                                                      </div>
                                                   </div>
                                                </fieldset>
                                             </li>
                                             <li class="toolbar__group">
                                                <fieldset>
                                                   <legend class="toolbar__heading">Options</legend>
                                                   <div class="toolbar__option toolbar__option--color">
                                                      <label for="stroke-color"><span class="toolbar__label">Stroke</span><span class="toolbar__button"></span></label>
                                                      <input id="stroke-color" type="color" value="#ff5e14" data-setting="strokeColor"/>
                                                   </div>
                                                   <div class="toolbar__option toolbar__option--color">
                                                      <label for="fill-color"><span class="toolbar__label">Fill</span><span class="toolbar__button"></span></label>
                                                      <input id="fill-color" type="color" value="#87EBA6" data-setting="fillColor"/>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="stroke-weight">Stroke Weight</label>
                                                      <input id="stroke-weight" type="number" min="0" max="300" value="6" data-setting="strokeWeight"/>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="line-cap">Line Cap:</label>
                                                      <select id="line-cap" data-setting="lineCap">
                                                         <option selected="selected" value="round">Round</option>
                                                         <option value="square">Square</option>
                                                         <option value="butt">Butt</option>
                                                      </select>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__label" for="line-join">Line Join:</label>
                                                      <select id="line-join" data-setting="lineJoin">
                                                         <option selected="selected" value="miter">Miter</option>
                                                         <option value="round">Round</option>
                                                         <option value="bevel">Bevel</option>
                                                      </select>
                                                   </div>
                                                   <div class="toolbar__option">
                                                      <label class="toolbar__toggle" for="guides">Guides</label>
                                                      <input id="guides" type="checkbox" checked data-setting="guides"/>
                                                   </div>
                                                </fieldset>
                                             </li>
                                          </ul>
      <button id="clear" class="btn btn-outline-danger">Clear</button>
      <button id="saveServer" ng-click="saveImagesize()" class="btn btn-success w-lg waves-effect waves-light" >Save Image</button>
      
      
                                                                
                                                              <div id="canvas"></div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



  <!-- Modal End-->








 <div class="modal fade exampleModalToggleLabel" id="firstmodalcommison" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel">Add new field</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            
                                                           <form id="pristine-valid-common2" ng-submit="submitFormmaster()" method="post">
                      








 <div class="row">

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Lable name <small style="color:red;">(No Space OR Use Space to _ )</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control" required  ng-model="label_name" placeholder="name_value" name="label_name" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                        
                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">If Categories </label>
                            <div class="col-sm-7">
                               <select class="form-control category_id" required name="category_id"  ng-model="category_id">

                              <option value=""> Select Categories</option>

                              <?php
                                foreach ($Categories as $value) {

                                  ?>
                                       <option value="<?php echo $value->id; ?>"><?php echo $value->categories; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control typeset" required  ng-model="typebase">
                                  <option value=""> Select Type</option>
                                  <option value="Input Open field">Input Open field</option>
                                  <option value="Multiple Options">Multiple Options</option>
                                  <option value="Date">Date</option>
                              </select>

                            </div>
                          </div>
                        </div>
                        
                        
                       
                        
                        
                         <div class="col-md-12" id="optionset" style="display:none;">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Maulti Option <small>Input value with (,)</small></label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control"   ng-model="option" name="option" type="text">

                            </div>
                          </div>
                        </div>
                        
                        
                                      <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Required Type</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control required" required  ng-model="required">
                                
                                  <option value="0">Not Required</option>
                                  <option value="1">Required</option>
                                  
                              </select>

                            </div>
                          </div>
                        </div>
                        
                                  <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Sort Order</label>
                            <div class="col-sm-7">
                              <input id="name" class="form-control"   ng-model="sort_order_id" placeholder="sort_order_id" name="sort_order_id" type="text">

                            </div>
                          </div>
                        </div>

                         <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Grouping</label>
                            <div class="col-sm-7">
                            
                              <select class="form-control" required  ng-model="grouping">
                                  
                                  <?php 
                                  foreach($grouping as $val)
                                  {  
                                      if($val->id==1)
                                      {
                                          
                                      
                                      ?>
                                      <option value="<?php echo $val->id; ?>"> <?php echo $val->name; ?></option> 
                                      <?php
                                      
                                      }
                                  }
                                  
                                  ?>
                              </select>

                            </div>
                          </div>
                        </div>

                       <div class="col-md-12">
                          <div class="form-group row">
                          
                            <div class="col-sm-12">
                                
                                  <input class="btn btn-success w-lg waves-effect waves-light" style="float: right;" type="submit" value="Create">

                            </div>
                          </div>
                        </div>
</div>
                        



            
                      
                      
                    
                    </form>
                                                            
                                                        </div>
                                                       
                                                    </div>
                                                </div>
</div>














   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
      
      
      
    
         <script>
         $(function(){
         $("#saveServer").click(function(){
             
         html2canvas($("canvas"), {
         	onrendered: function(canvas) {
         	var imgsrc = canvas.toDataURL("image/png");
         
         	$("#newimg").attr('src',imgsrc);
         	$("#img").show();
            
            
            $('#imagesizemodel').modal('toggle');
         
         }
         });
         
         
         });
         });
      </script>
      
      
      <script type="text/javascript">
         const canvas = document.createElement('canvas'),
              ctx = canvas.getContext('2d'),
              grid = true,
              gridSpacing = 20,
              guidesBtn = document.getElementById('guides'),
              rubberBandRect = {},
              pointerDownLocation = {},
              tools = document.querySelectorAll('input[type="radio"]'),
              optionInputs = {
                sidesSelect: document.getElementById('sides'),
                strokeSelect: document.getElementById('stroke-color'),
                fillSelect: document.getElementById('fill-color'),
                lineCapSelect: document.getElementById('line-cap'),
                lineJoinSelect: document.getElementById('line-join'),
                weightSelect: document.getElementById('stroke-weight')
              },
              settings = {
                shape: 'line',
                strokeColor: optionInputs.strokeSelect.value,
                fillColor: optionInputs.fillSelect.value,
                strokeWeight: optionInputs.weightSelect.value,
                lineCap: optionInputs.lineCapSelect.value,
                polygonSides: optionInputs.sidesSelect.value
              },
              clearBtn = document.getElementById('clear'),
              saveBtn = document.getElementById('saveServer'),
              debug = true,
              polygons = []
         
         	let imgData = null,
         	    dragging = false;
         
         	function Point(x, y) {
         	  this.x = x;
         	  this.y = y;	
              }
         
         function Polygon(x, y, radius, sides) {
          this.x = x;
          this.y = y;
          this.radius = radius;
          this.sides = sides;
         }
         
         Polygon.prototype = {
          getPoints: function() {
            let points = [],
            angle = 0,
            i;
          
            for (i = 1; i <= this.sides; i++) {
              let point = new Point(this.x + this.radius * Math.cos(angle),
                                    this.y - this.radius * Math.sin(angle));
              points.push(point);
              angle += 2*Math.PI / this.sides;
            }
         
            return points;
          },
          createPath: function(context) {
            let points = this.getPoints();
            
            ctx.moveTo(points[0].x, points[0].y);
         
            for (let i = 1; i < points.length; i++) {
              ctx.lineTo(points[i].x, points[i].y);
            }
         
            ctx.closePath();
          },
          move: function(x, y) {
            this.x = x;
            this.y = y;
          }
         }
         
         function setCanvasSize(width, height) {
          if (width && height) {
            ctx.canvas.width = width;
            ctx.canvas.height = height;    
          } else {
            ctx.canvas.width = window.innerWidth;
            ctx.canvas.height = window.innerHeight;
          }
         }
         
         function unifyCoordinates(x, y) {
          let rect = canvas.getBoundingClientRect();
          return {
            x: Math.floor( (x - rect.left) * (canvas.width / rect.width) ) + 0.5,
            y: Math.floor( (y - rect.top) * (canvas.height / rect.height) ) + 0.5
          }
         }
         
         function saveData() {
          imgData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
          console.log(imgData);
         }
         
         function restoreData() {
          ctx.putImageData(imgData, 0, 0);
         }
         
         function drawGrid(spacing) {
          let canvasWidth = ctx.canvas.width,
              canvasHeight = ctx.canvas.height,
              start = spacing + 0.5,
              iVertLines = Math.floor(canvasWidth / spacing),
              iHorizLines = Math.floor(canvasHeight / spacing),
              i;
          
          ctx.save();
          ctx.strokeStyle = 'rgba(255, 94, 20, 0.1)';
          
          // draw vertical lines
          for (i = start; i < canvasWidth; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(i, 0);
            ctx.lineTo(i, canvasHeight);
            ctx.closePath();
            ctx.stroke();
          }
          
          // draw horizontal lines
          for (i = start; i < canvasHeight; i += spacing) {
            ctx.beginPath();
            ctx.moveTo(0, i);
            ctx.lineTo(canvasWidth, i);
            ctx.closePath();
            ctx.stroke();
          }
          
          ctx.restore();
         }
         
         function clearCanvas() {
          ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
          drawGrid(gridSpacing);
         }
         
         function drawGuides(location) {
          ctx.save();
          ctx.strokeStyle = 'rgb(255, 94, 20, 0.8)';
          ctx.lineWidth = 1;
          
          ctx.beginPath();
          ctx.moveTo(0, location.y);
          ctx.lineTo(ctx.canvas.width, location.y);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.moveTo(location.x, 0);
          ctx.lineTo(location.x, ctx.canvas.height);
          ctx.closePath();
          ctx.stroke();
          
          ctx.restore();
         }
         
         function drawPointerDownArc() {
          ctx.save();
          ctx.fillStyle = 'rgba(255,0,0,0.5)';
          ctx.beginPath();
          ctx.arc(pointerDownLocation.x,
                  pointerDownLocation.y,
                  10, 0, Math.PI * 2);
          ctx.fill();
         }
         
         function makeRubberBandRect(location) {
          if (pointerDownLocation.x < location.x) {
            rubberBandRect.left = pointerDownLocation.x;
          } else {
            rubberBandRect.left = location.x;
          }
          
          if (pointerDownLocation.y < location.y) {
            rubberBandRect.top = pointerDownLocation.y;
          } else {
            rubberBandRect.top = location.y;
          }
          
          rubberBandRect.width = Math.abs(pointerDownLocation.x - location.x);
          rubberBandRect.height = Math.abs(pointerDownLocation.y - location.y);
         }
         
         function drawRubberBandReference() {
          ctx.save();
          ctx.strokeStyle = 'black';
          ctx.lineWidth = 1;
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left,
                  rubberBandRect.top,
                  4, 0, Math.PI * 2);
          ctx.closePath();  
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left + rubberBandRect.width,
                  rubberBandRect.top,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left, 
                  rubberBandRect.top + rubberBandRect.height,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.beginPath();
          ctx.arc(rubberBandRect.left + rubberBandRect.width,
                  rubberBandRect.top + rubberBandRect.height,
                  4, 0, Math.PI * 2);
          ctx.closePath();
          ctx.stroke();
          
          ctx.restore();
         }
         
         function drawRubberBandShape(location, shape) {
          ctx.save();  
          ctx.beginPath();
          
          let polygon;
          
          switch (shape) {
            case 'line':
              ctx.moveTo(pointerDownLocation.x,
                         pointerDownLocation.y);
              ctx.lineTo(location.x, location.y);
              break;
            
            case 'rectangle':
              ctx.rect(rubberBandRect.left,
                       rubberBandRect.top,
                       rubberBandRect.width,
                       rubberBandRect.height);
              break;
              
            case 'circle':
              ctx.arc(pointerDownLocation.x,
                      pointerDownLocation.y,
                      rubberBandRect.width * 0.5,
                      0,
                      Math.PI * 2,
                      false);
              break;
              
            case 'polygon':
              polygon = new Polygon(pointerDownLocation.x,
                                    pointerDownLocation.y,
                                    rubberBandRect.width * 0.5,
                                    settings.polygonSides);
              polygon.createPath(ctx);
              break;
          }
          
          ctx.lineCap = settings.lineCap;
          ctx.lineJoin = settings.lineJoin;
          
          if (settings.strokeWeight > 0) {
            ctx.strokeStyle = settings.strokeColor;
            ctx.lineWidth = settings.strokeWeight;
            ctx.stroke();
          }
          
          if (settings.fillColor && settings.shape !== 'line') {
            ctx.fillStyle = settings.fillColor;
            ctx.fill();
          }
          
          ctx.closePath();
          ctx.restore();
          
          if (!dragging && shape === 'polygon') {
            polygons.push(polygon);
          }
         }
         
         function onResize() {
          saveData();
          setCanvasSize();
          if (grid) drawGrid(gridSpacing);
          restoreData();
         }
         
         function onPointerDown(e) {
          let location = unifyCoordinates(e.clientX, e.clientY);
          pointerDownLocation.x = location.x;
          pointerDownLocation.y = location.y;
          dragging = true;
          saveData();
          
          if (debug) drawPointerDownArc();
          if (guidesBtn.checked) drawGuides(location);
         }
         
         function onPointerMove(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            restoreData();
            if (guidesBtn.checked) drawGuides(location);
            makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
            if (debug) {
              drawPointerDownArc();
              drawRubberBandReference();
            }
          }
         }
         
         function onPointerUp(e) {
          if (dragging) {
            let location = unifyCoordinates(e.clientX, e.clientY);
            dragging = false;
            restoreData();
            makeRubberBandRect(location);
            drawRubberBandShape(location, settings.shape);
          }
         }
         
         function onToolChange(e) {
          this.checked = true;
          settings.shape = this.value;
         }
         
         function onOptionChange(e) {
          let option = this.dataset.setting;
          
          if (option === 'strokeColor' || option === 'fillColor') {
            let label = this.previousElementSibling;
            let button = label.querySelector('.toolbar__button');
            button.style.backgroundColor = this.value;
            settings[option] = this.value;
          } else {
            settings[option] = this.value;
          }
         }
         
         window.addEventListener('resize', onResize);
         canvas.addEventListener('pointerdown', onPointerDown);
         canvas.addEventListener('pointermove', onPointerMove);
         canvas.addEventListener('pointerup', onPointerUp);
         clearBtn.addEventListener('click', clearCanvas);
         saveBtn.addEventListener('click', saveData);
         
         for (let tool of tools) {
          tool.addEventListener('click', onToolChange);
         }
         
         for (let i of Object.keys(optionInputs)) {
          optionInputs[i].addEventListener('change', onOptionChange);
          
          // set inital styles
          if (i === 'strokeSelect' || i === 'fillSelect') {
            optionInputs[i].previousElementSibling
              .querySelector('.toolbar__button')
              .style.backgroundColor = optionInputs[i].value;
          }
         }
         
         canvas.setAttribute('touch-action', 'none');
         
        
         document.getElementById("canvas").appendChild(canvas);
         
         
         onResize();
         clearCanvas();
         saveData();
      </script>











<script>
$(document).ready(function(){
    
    
    
    $(".typeset").click(function(){
   
   var a= $(this).val();
   
   if(a=='Multiple Options')
   {     
       $('#optionset').show();
       
   }
   else
   {
        $('#optionset').hide();
   }
    
    
  });
    
  
    
    
  $(".categories").change(function(){
     var acc=$(this).val();
     $('.fisrtfind').hide();
     
      var dataset=$(this).find(':selected').data('id')

      
      $('.set_'+dataset).show();
     
     if(acc=='Accesories' || acc=='Tile sheet' || acc=='Aluminium' || acc=='Purlin' || acc=='Decking sheet' || acc=='Profile ridge & Arch' || acc=='Screw' || acc=='Screw accesories' || acc=='Liner Sheets' || acc=='Roll Sheet' || acc=='Rent Bill' || acc=='Steel Coil')
     {
         $('#dis_acc').show();
     }
     else
     {
         $('#dis_acc').hide();
     }
     
     
     
     if(acc=='Profile ridge & Arch')
     {
         $('#kgprice').show();
         $('#namechange').text('Arch Plus Value Price');
         $('#formula2').hide();
     }
     else if(acc=='Decking sheet' || acc=='Aluminium')
     {
          $('#kgprice').show();
          $('#formula2').show();
          $('#namechange').text('Kg Price');
        
     }
     else
     {
           $('#kgprice').hide();
           $('#formula2').hide();
     }
     
     
     
     
     
  });
  
  
  
  
  
  
  
});



var count_value_dyeing = 1;



function add_rowprice()
{
        
        
      $('#price_details').show();

      var all =count_value_dyeing++;
      
      var data='<div class="row showdata"> <div class="col-md-5"> <div class="form-group row"> <div class="col-sm-12"> <input id="price" class="form-control price ng-pristine ng-invalid ng-invalid-required ng-touched" name="price" required="" ng-model="price" type="text"> </div> </div> </div> <div class="col-md-5"> <div class="form-group row"> <select class="form-control price_type ng-pristine ng-untouched ng-valid" name="price_type" ng-model="price_type"> <?php foreach ($price_master as $value) { ?> <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option> <?php } ?> </select> </div> </div><div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_rowprice();"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove();"><i class="fa fa-minus"></i></button> </div> </div> </div> </div>';
      
      $('#price_details').append(data);
      
}
function remove()
{

      $('#price_details .showdata:last').remove();
                 
}










function add_row_option()
{

      var all =count_value_dyeing++;
      
      var data='<div class="row showdata"> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input  class="form-control label_option1" placeholder="number" name="label_option1[]" ng-model="label_option1" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12"> + </div> </div> </div> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input  class="form-control label_option2" placeholder="number" name="label_option2[]" ng-model="label_option2" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12">  </div> </div> </div>  <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_row_option();"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove_option();"><i class="fa fa-minus"></i></button> </div> </div> </div> </div>';
      
      $('#show_details2').append(data);
      
}
function remove_option()
{

      $('#show_details2 .showdata:last').remove();
                 
}




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
    
    
    
    
    
     $scope.type = 0;
   

  $scope.success = false;
  $scope.error = false;
  $scope.price_type = 1;
  $scope.required = 0;
  $scope.sort_order_id = 0;


   $scope.submit_button = 'Save';
   $scope.input_label=0;



$scope.grouping=1;



$scope.submitFormmaster = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'type':$scope.typebase,'sort_order_id':$scope.sort_order_id,'category_id':$scope.category_id,'required':$scope.required,'option':$scope.option,'grouping':$scope.grouping,'id':1,'action':'Add','tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
       
       
         alert('Created..');
         location.reload();
        
      }



    });
  };

 
 
  $scope.submitForm = function(){
      
      
      
      
      var price_lable = $(".price");
      var price_value = [];
      for(var i = 0; i < price_lable.length; i++){
          
           price_value.push($(price_lable[i]).val());
         
      }
      
      
      var price= price_value.join("|");
      
      

        var price_type = $(".price_type");
      var price_type_value = [];
      for(var i = 0; i < price_type.length; i++){
          
           price_type_value.push($(price_type[i]).val());
         
      }
      
      
      var price_type= price_type_value.join("|");
      
      
      
      
      
      
      
      var label1 = $(".label1");
      var label1_value = [];
      for(var i = 0; i < label1.length; i++){
          
           label1_value.push($(label1[i]).val());
         
      }
      
      
      var lab1= label1_value.join("|");
      
      var label2 = $(".label2");
      var label2_value = [];
      for(var i = 0; i < label2.length; i++){
          
           label2_value.push($(label2[i]).val());
         
      }
      
      var lab2= label2_value.join("|");
      
      
      
      
      
      var point = $(".point");
      var point_value = [];
      for(var i = 0; i < point.length; i++){
          
           point_value.push($(point[i]).val());
         
      }
      var lab_point= point_value.join("|");
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      var label_option1 = $(".label_option1");
      var label_option1_value = [];
      for(var i = 0; i < label_option1.length; i++){
          
           label_option1_value.push($(label_option1[i]).val());
         
      }
      
      
      var lab_option1= label_option1_value.join("|");
      
      var label_option2 = $(".label_option2");
      var label_option2_value = [];
      for(var i = 0; i < label_option2.length; i++){
          
           label_option2_value.push($(label_option2[i]).val());
         
      }
      
      var lab_option2= label_option2_value.join("|");
      
      
      
      
      
      
      
      
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/products/insertandupdate",
      data:{
          'status':'1',
          'lab_option1':lab_option1,
          'lab_option2':lab_option2,
          'label1':lab1,
          'label2':lab2,
          <?php
          foreach($additional_information1 as $vl)
          {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
          }
          ?>
          'stock':$scope.stock,
          <?php
          foreach($additional_information as $vl)
          {
             $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
          }
          ?>
          'optimal_stock':$scope.optimal_stock,
          'production_stock':$scope.production_stock,
          'min_order_stock':$scope.min_order_stock,
          'formula2':$scope.formula2,
          'price_type':price_type,
          'point':lab_point,'type':$scope.type,'link_to_purchase':$scope.link_to_purchase,'formula':$scope.formula,'description':$scope.description,'side_label':$scope.side_label,'input_label':$scope.input_label,'source_name':$scope.source_name,'price':price,'uom':$scope.uom,'HSN_SAC':$scope.HSN_SAC,'categories':$scope.categories,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'product_list'}
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
           
            $scope.price = "";
            $scope.kg_price = "";
           
           
            $scope.HSN_SAC = "";
            $scope.formula = "";
            $scope.formula2 = "";
            $scope.stock = "";
            $scope.optimal_stock = "";
            
         
             
             
             
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = "";
                                  <?php
                                 }
                                 ?>
           
            $scope.successMessage = data.massage;
            
            
            
            
            
            
            
                                     var imgsrc= $("#newimg").attr('src');
    
                             
                             
                                     $http({
                                      method:"POST",
                                      url:"<?php echo base_url() ?>index.php/products/fileuplaodtosaveimage",
                                      data:{'id':data.insert_id,'imgeurl':imgsrc}
                                     }).success(function(data){
              
                                     });  
                                     
                                     
                                     
                                     
                                     
                                     
                                       var form_data = new FormData();  
                                       angular.forEach($scope.files, function(file){  
                                            form_data.append('file[]', file);  
                                       });  
                                       $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave?id='+data.insert_id, form_data,  
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


