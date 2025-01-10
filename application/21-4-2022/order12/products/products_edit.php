<?php  include "header.php"; ?>
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
         
.imageid { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
.imageid + img {
  cursor: pointer;
}

/* CHECKED STYLES */
.imageid:checked + img {
  outline: 2px solid #f00;
}

 #pristine-valid-common2 .row .col-md-12 {
    /* line-height: 44px; */
    margin-bottom: 14px;
}

.buttonright
{
    position: absolute;
    margin: 13px 17px;
    right: 0;
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
                                    <h4 class="mb-sm-0 font-size-18">Product  Edit</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/products/products_list">Product List</a></li>
                                            <li class="breadcrumb-item active"> Product Forms Edit</li>
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
                  <div class="card-body" ng-init="fetchData()">

                       
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















<h4>Product name : {{source_name_full}}</h4>







<form id="pristine-valid-example" novalidate method="post"></form>



                                        










                    
                    <form id="pristine-valid-common" ng-submit="submitForm()" method="post">
                    



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
                                       <option value="<?php echo $value->categories; ?>"><?php echo $value->categories; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6">
                          <div class="form-group row">
                             <label class="col-sm-12 col-form-label">Fact/Sq.Mtrs/Running meter weight/ Dimension   </label>
                            <div class="col-sm-12">
                              <input id="formula" class="form-control" required name="formula" ng-model="formula" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-2" id="formula2" style="display:none">
                          <div class="form-group row">
                             <label class="col-sm-12 col-form-label">Fact/Sq.Mtrs/Running meter weight/ Dimension KG 2  <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                              <input id="kg_formula" class="form-control" required name="formula2" ng-model="formula2" type="text">
                            </div>
                          </div>
                        </div>
                      
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-4">
                          <div class="form-group row">
                                 <label class="col-sm-12 col-form-label">Product name Builder <span style="color:red;">*</span></label>
                            
                            <div class="col-sm-12">
                             <input id="source_name" class="form-control" name="source_name" placeholder="Source Name"   required ng-model="source_name" type="text">
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-2">
                          <div class="form-group row">
                         
                             <label class="col-sm-12 col-form-label">&nbsp;</label>
                            <div class="col-sm-12">
                           
                                <select class="form-control"  name="color"  ng-model="color">

                              <option value="0"> Select Color</option>

                              <?php
                                foreach ($color as $value) {

                                  ?>
                                       <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                          <div class="col-md-2">
                          <div class="form-group row">
                              <label class="col-sm-12 col-form-label">&nbsp;</label>
                            <div class="col-sm-12">
                           
                                <select class="form-control"  name="gsm"  ng-model="gsm">

                              <option value="0"> Select GSM</option>

                              <?php
                                foreach ($gsm as $value) {

                                  ?>
                                       <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        
                         <div class="col-md-2">
                          <div class="form-group row">
                              <label class="col-sm-12 col-form-label">&nbsp;</label>
                            <div class="col-sm-12">
                           
                                <select class="form-control"  name="thickness"  ng-model="thickness">

                              <option value="0"> Select Thickness</option>

                              <?php
                                foreach ($thickness as $value) {

                                  ?>
                                       <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                          <div class="col-md-2">
                          <div class="form-group row">
                              <label class="col-sm-12 col-form-label">&nbsp;</label>
                            <div class="col-sm-12">
                           
                                <select class="form-control"  name="ys"  ng-model="ys">

                              <option value="0"> Select YS</option>

                              <?php
                                foreach ($ys as $value) {

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
                            
                            
                            
                             
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           
                                 <span ng-if="price" class="row">
                              
                              
                          
                            
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
                    <select class="form-control price_type" name="price_type"  >

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                                                            
                                                             
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>" <?php if($value->id==1){ echo "selected"; } ?> ><?php echo $value->name; ?></option>
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
                        
                        
                        
                         </span> 
                        
                        
                        
                        
                        
                                 <span ng-if="kg_price" class="row">
                              
                              
                          
                            
                          <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control price" name="price"   required ng-model="kg_price" type="text">
                            </div>
                          </div>
                           </div>
                        
                          
                          <div class="col-md-5" >
                         
                         
                          <div class="form-group row">
                           <label class="col-sm-12 col-form-label">Price Type <span style="color:red;">*</span></label>
                    <select class="form-control price_type" name="price_type"  >

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                                                            
                                                             
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>" <?php if($value->id==5){ echo "selected"; } ?> ><?php echo $value->name; ?></option>
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
                        
                        
                        
                         </span> 
                        
                        
                        
                        
                        
                        
                        
                             
                                 <span ng-if="conversion_price" class="row">
                              
                              
                          
                            
                          <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control price" name="price"   required ng-model="conversion_price" type="text">
                            </div>
                          </div>
                           </div>
                        
                          
                          <div class="col-md-5" >
                         
                         
                          <div class="form-group row">
                           <label class="col-sm-12 col-form-label">Price Type <span style="color:red;">*</span></label>
                    <select class="form-control price_type" name="price_type"  >

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                                                            
                                                             
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>" <?php if($value->id==2){ echo "selected"; } ?> ><?php echo $value->name; ?></option>
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
                        
                        
                        
                         </span> 
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                 <span ng-if="retail_price" class="row">
                              
                              
                          
                            
                          <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control price" name="price"   required ng-model="retail_price" type="text">
                            </div>
                          </div>
                           </div>
                        
                          
                          <div class="col-md-5" >
                         
                         
                          <div class="form-group row">
                           <label class="col-sm-12 col-form-label">Price Type <span style="color:red;">*</span></label>
                    <select class="form-control price_type" name="price_type"  >

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                                                            
                                                             
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>" <?php if($value->id==3){ echo "selected"; } ?> ><?php echo $value->name; ?></option>
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
                        
                        
                        
                         </span> 
                        
                        
                        
                        
                        
                        
                        
                        
                        
                              <span ng-if="coil_sale_price" class="row">
                              
                              
                          
                            
                          <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Price <span style="color:red;">*</span></label>
                            <div class="col-sm-12">
                             <input id="price" class="form-control price" name="price"   required ng-model="coil_sale_price" type="text">
                            </div>
                          </div>
                           </div>
                        
                          
                          <div class="col-md-5" >
                         
                         
                          <div class="form-group row">
                           <label class="col-sm-12 col-form-label">Price Type <span style="color:red;">*</span></label>
                    <select class="form-control price_type" name="price_type"  >

                                                     
                        
                                                      <?php
                                                        foreach ($price_master as $value)
                                                        {
                                                            
                                                             
                        
                                                          ?>
                                                               <option value="<?php echo $value->id; ?>" <?php if($value->id==4){ echo "selected"; } ?> ><?php echo $value->name; ?></option>
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
                        
                        
                        
                         </span> 
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      </div>


  
                       <div id="price_details" style="display:none;"></div>
                       
                       
                       
                       
                        <div class="row">
                            
                            
                             <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Current Stock</label>
                            <div class="col-sm-12">
                              <input id="stock" class="form-control" name="stock"  ng-model="stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Optimal Stock</label>
                            <div class="col-sm-12">
                              <input id="optimal_stock" class="form-control" name="optimal_stock"  ng-model="optimal_stock" type="text">
                            </div>
                          </div>
                        </div>
                        
                        
                        
                            
                              <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Brand</label>
                            <div class="col-sm-12">
                           
                                <select class="form-control" name="brand"  ng-model="brand">

                              <option value=""> Select Brand</option>

                              <?php
                                foreach ($brand as $value) {

                                  ?>
                                       <option value="<?php echo $value->categories; ?>"><?php echo $value->categories; ?></option>
                                  <?php
                                  
                                }
                              ?>
                            
                              

                              </select>
                              
                              
                            </div>
                          </div>
                        </div>
                             <div class="col-md-3">
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
                        
                        
                        
                        
                           
                         <?php
                        
                        foreach($additional_information as $vvl)
                        {
                                     if($vvl->type=='Multiple Options')
                                     {
                                         
                                         
                                           $option=$vvl->option;
                                           $option=explode(',', $option);
                                         
                            ?>
                                               <div class="col-md-3" >
                                              
                                                 <div class="form-group row">
                                                      
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                            <select class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
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
                                                     
                                                         <label class="col-sm-12 col-form-label"><?php echo str_replace('_',' ',ucfirst($vvl->label_name)); ?></label>
                                                         <div class="col-sm-12">
                                                           
                                                           
                                                           <input type="<?php echo $vv; ?>" class="form-control <?php echo strtolower($vvl->label_name); ?>"  name="<?php echo strtolower($vvl->label_name); ?>"  ng-model="<?php echo strtolower($vvl->label_name); ?>">
                                                           
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
                       
                        
                       
                        
                        
                        
                         <!--<h4 class="card-title mt-3">Image Side </h4>-->
                        
                         
                       <div class="col-md-6" style="display:none">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Stock</label>
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
                            <label class="col-sm-12 col-form-label">&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-12">
                            
                               
 <a href="#" class="btn btn-light" ng-click="imgpreview()" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Image Gallery</a>
                         

                            </div>
                          </div>
                          
                          
                        </div>
                        
                        
                        
                       
                        
                        
                        
                        
                        
                        
                        
                          <div id="dis_acc" ng-if="type!=0">
                              
                              
                              
                               
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
                              </select>
                             
                            </div>
                          </div>
                        </div>
                     
                          
                          
                            
                          
                          <span ng-init="fetchDatasize()" style="display:none;">
                              <h4 class="card-title mt-3">Sizes </h4>
                        
                           <div class="row" ng-repeat="name in namesData">  
                        
                        
                      
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input id="product_name" class="form-control label1"  ng-model="name.label1" name="label1[]"  type="text">
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
                              <input id="product_name" class="form-control label2"  ng-model="name.label2" name="label2[]"  type="text">
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
                             <select class="form-control point" name="point"  ng-model="name.point">

                              
                              <option value="1" >Top ot Bottom</option>
                              <option value="2" >Bottom ot Top</option>
                              <option value="3" >Right ot Left</option>
                              <option value="4" >Left ot Right</option>

                              
                              

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
                          </span>
                        
                          <div id="show_details" style="display:none;"></div>
                          
                          
                          
                          <span ng-init="fetchDatasizeoptions()" style="display:none;">
                              <h4 class="card-title mt-3">Size Options </h4>
                        
                           <div class="row" ng-repeat="name in namesDataoptons">  
                        
                        
                      
                        
                        <div class="col-md-2">
                          <div class="form-group row">
                         
                            <div class="col-sm-12">
                              <input id="product_name" class="form-control label_option1"  ng-model="name.label_option1" name="label_option1[]"  type="text">
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
                              <input id="product_name" class="form-control label_option2"  ng-model="name.label_option2" name="label_option2[]"  type="text">
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
                        </span>
                        
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
                                
                                  <div class="form-check" >
                                  <label class="form-check-label" >
                                  <input type="checkbox" class="form-check-input"  ng-model="link_to_purchase"  id="link_to_purchase" value="1" checked> Link with Purchase module PO generation <i class="input-helper"></i></label>
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







<div class="modal fade bs-example-modal-center"  id="imagesizemodel1" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Choose Image <small>(multiple)</small></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="height: 500px;overflow: auto;">
                                                                
                                                                
                                                                
                                                                
                                                                <form  ng-submit="imageuploadInproduct()" method="post" id="productupload">
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                  <div class="row" style="margin-bottom: 10px;">
                                                                   
                                                                    <div class="col-md-4" style="display:none;" >
                                                                        
                                                                        <select class="form-control" name="layout_plan" id="layout_plan">
                                                                            
                                                                            <option value="layout_plan">Select Layout Plan</option>
                                                                            <?php
                                                                            foreach($layout_plan as $val)
                                                                            {
                                                                                ?>
                                                                                
                                                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?> | (<?php echo $val->values; ?>)</option>
                                                                                <?php
                                                                            }
                                                                            
                                                                            ?>
                                                                            
                                                                        </select>
                                                                        
                                                                        </div>
                                                                   <div class="col-md-2" style="display:none;"><input type="text" class="form-control " id="lengthvalset" placeholder="length"></div>
                                                                 
                                                                   <div class="col-md-4"><input type="file" file-input="files" multiple class="form-control"></div>
                                                                   <div class="col-md-2"><button class="btn btn-success" id="uploadbutton">Upload</button></div>
                                                                   
                                                                   
                                                                   </div>
                                                                </form>
                                                                
                                                                  <form  ng-submit="imageuploadInproductupdate()" method="post" id="productupdate" style="display:none;">
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                  <div class="row" style="margin-bottom: 10px;">
                                                                   
                                                                    <div class="col-md-4 showhide">
                                                                        
                                                                        <select class="form-control" name="layout_plan1" id="layout_plan1">
                                                                            
                                                                            <option value="layout_plan">Select Layout Plan</option>
                                                                            <?php
                                                                            foreach($layout_plan as $val)
                                                                            {
                                                                                ?>
                                                                                
                                                                                 <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?> | (<?php echo $val->values; ?>)</option>
                                                                                <?php
                                                                            }
                                                                            
                                                                            ?>
                                                                            
                                                                        </select>
                                                                        
                                                                        </div>
                                                                        
                                                                        <div class="col-md-2 showhide"><input type="text" class="form-control " id="lengthvalset1" placeholder="length"></div>
                                                                 
                                                                        <input  type="hidden" id="image_plan_id">
                                                                   
                                                                   
                                                                       <div class="col-md-4"><button type="submit" class="btn btn-success" id="uploadbutton1">UPDATE</button> <button type="button" class="btn btn-primary" id="back">BACK</button></div>
                                                                   
                                                                   
                                                                   </div>
                                                                </form>
                                                                
                                                                
                                                                
                                                         
                                                            <div class="row" ng-init="imgpreviewimages()">
                                                                
                                                                
                                                                <div class="col-md-6" ng-repeat="nameimage in namesDataoptonsimages">
                                                                    
                                                                    <button type="button"  ng-click="deleteDataimage(nameimage.id)" class="btn btn-outline-danger buttonright"><i class="mdi mdi-delete menu-icon"></i></button>
                                                                  
                                                                  
                                                                   <label> <input type="radio" name="imageid" class="imageid" value="{{nameimage.id}}" ng-click="imageSizeupdate(nameimage.image_layout_plan,nameimage.id,nameimage.length)">
                                                                    <img class="border-set" alt="200x200" style="width:100%;border: #959595 solid 2px;padding: 20px"  src="{{nameimage.product_image}}" data-holder-rendered="true">
                                                                    </label>
                                                                    
                                                                    <p>{{nameimage.valuseset}} {{nameimage.lengthlab}} </p>
                                                                    
                                                                </div><!-- end col -->
                                                                
                                                                
                                                                  <span ng-show="namesDataoptonsimages.length==0">
                                                                    No Image Found 
                                                                 </span>
                                                               
                                                            </div>
                                                            
                                                                
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            
                                                        </div>
                                                            
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






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





  <!-- Modal End-->



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
  
     $("#back").click(function(){
   
                 $('#productupload').show();
                 $('#productupdate').hide();
    
      });
  
  
    
    
    $(".categories").change(function(){
     var acc=$(this).val();
     
     if(acc=='Accesories' || acc=='Tile sheet' || acc=='Aluminium' || acc=='Purlin' || acc=='Decking sheet' || acc=='Profile ridge & Arch' || acc=='Screw' || acc=='Screw accesories')
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
      
      var data='<div class="row showdata"> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input id="product_name" class="form-control label_option1" placeholder="number" name="label_option1[]" ng-model="label_option1" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12"> + </div> </div> </div> <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <input id="product_name" class="form-control label_option2" placeholder="number" name="label_option2[]" ng-model="label_option2" type="number"> </div> </div> </div> <div class="col-md-1"> <div class="form-group row"> <div class="col-sm-12">  </div> </div> </div>  <div class="col-md-2"> <div class="form-group row"> <div class="col-sm-12"> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return add_row_option();"><i class="fa fa-plus"></i></button> <button type="button" class="btn btn-outline-info btn-mini waves-effect waves-light addbutton" onclick="return remove_option();"><i class="fa fa-minus"></i></button> </div> </div> </div> </div>';
      
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

  $scope.success = false;
  $scope.error = false;



  $scope.submit_button = 'Update';

  $scope.input_label=0;

 $scope.type=0;

 
 
 
 
 
 
 
 
 $scope.grouping=1;
 
 
$scope.submitFormmaster = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/additional_information/insertandupdate",
      data:{'label_name':$scope.label_name,'type':$scope.typebase,'option':$scope.option,'grouping':$scope.grouping,'id':1,'action':'Add','tablename':'additional_information'}
    }).success(function(data){
       
      if(data.error != '1')
      {
       
       
         alert('Created..');
         location.reload();
        
      }



    });
  };

 
 
 
 $scope.deleteDataimage = function(id){
    if(confirm("Are you sure you want to remove it?"))
    {
      $http({
        method:"POST",
        url:"<?php echo base_url() ?>index.php/products/insertandupdate",
        data:{'id':id, 'action':'Delete','tablename':'product_images'}
      }).success(function(data){
          var product_id='<?php echo $id; ?>';
          $scope.imgpreviewimages(product_id);
      }); 
    }
};
 
 
 

$scope.imageSizeupdate = function(baseid,id,length)
{


   // $('#productupload').hide();
    //$('#productupdate').show();
    $('#layout_plan1').val(baseid);
    $('#lengthvalset1').val(length);
    $('#image_plan_id').val(id);              
}


 $scope.imageuploadInproductupdate = function(){
           
                              var layout_plan= $('#layout_plan1').val();
                              var image_plan_id= $('#image_plan_id').val();
                              var lengthvalset1= $('#lengthvalset1').val();
                              
                               $('#uploadbutton1').html('Loading..');
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/insertandupdate",
                                data:{'layout_plan':layout_plan,'lengthvalset':lengthvalset1,'id':image_plan_id,'action':'updatelayputplan','tablename':'product_images'}
                                }).success(function(data){
                                    
                                    alert('Updated');
                                    var product_id='<?php echo $id; ?>';
                                    $scope.imgpreviewimages(product_id);
                                    $('#productupload').show();
                                    $('#productupdate').hide();
                                    $('#uploadbutton1').html('Update');
                                 
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
      data:{'status':'1','lab_option1':lab_option1,'lab_option2':lab_option2,
      'label1':lab1,
      'stock':$scope.stock,
      'price_type':price_type,
      <?php
      foreach($additional_information as $vl)
      {
        $label_name=strtolower($vl->label_name);
             ?>
             '<?php echo $label_name; ?>' : $scope.<?php echo $label_name; ?>,
             <?php
      }
      ?>
      'optimal_stock':$scope.optimal_stock,'source_name':$scope.source_name,'formula2':$scope.formula2,'type':$scope.type,'link_to_purchase':$scope.link_to_purchase,'label2':lab2,'point':lab_point,'formula':$scope.formula,'description':$scope.description,'side_label':$scope.side_label,'input_label':$scope.input_label,'color':$scope.color,'ys':$scope.ys,'gsm':$scope.gsm,'thickness':$scope.thickness,'price':price,'brand':$scope.brand,'uom':$scope.uom,'HSN_SAC':$scope.HSN_SAC,'categories':$scope.categories,'id':$scope.hidden_id,'action':$scope.submit_button,'tablename':'product_list'}
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
            

            //$scope.success = true;
            //$scope.error = false;
            //$scope.successMessage = data.massage;
            
            
            
            
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
                                           
                                           
                                       });  
                                       
                                       
                                       
                                            alert('Product successfully Updated.');
                                            window.close();
                                             
                              
                                   
            
            
           
            
            
          

          }

          

      }

       
    });
  };


$scope.fetchData = function(){
    $http({
      method:"POST",
      url:"<?php echo base_url() ?>index.php/products/fetch_single_data",
      data:{'id':<?php echo $id; ?>, 'action':'fetch_single_data','tablename':'product_list'}
    }).success(function(data){

        $scope.product_name = data.product_name;
        $scope.price = data.price;
        $scope.phone = data.phone;
        $scope.brand = data.brand;
        $scope.uom = data.uom;
        $scope.formula = data.formula;
        $scope.HSN_SAC = data.HSN_SAC;
        
        
        
        
        $scope.categories = data.categories;
        
        
      
        if(data.categories=='Profile ridge & Arch')
        {
             $('.showhide').hide();
        }
        
        
        
        
        $scope.description = data.description;
        $scope.hidden_id = data.id;
        $scope.stock = data.stock;
        $scope.optimal_stock = data.optimal_stock;
        $scope.side_label=data.side_label;
        $scope.input_label=data.input_label;
        $scope.link_to_purchase=data.link_to_purchase;
        $scope.type=data.type;
        $scope.source_name=data.source_name;
        $scope.source_name_full=data.source_name_full;
        
        
        
        $scope.kg_price=data.kg_price;
        
        
        
        $scope.conversion_price=data.conversion_price;
        $scope.retail_price=data.retail_price;
        $scope.coil_sale_price=data.coil_sale_price;
        
        $scope.formula2=data.formula2;
        
        
        
        
                                 <?php
                                 foreach($additional_information as $vl)
                                 {
                                   $label_name=strtolower($vl->label_name);
                                  ?>
                                    $scope.<?php echo $label_name; ?> = data.<?php echo $label_name; ?>;
                                  <?php
                                 }
                                 ?>
        
        
        
         
        if(data.categories=='Profile ridge & Arch')
        {
             $('#kgprice').show();
            
        }
        
         if(data.categories=='Decking sheet' || data.categories=='Aluminium')
        {
             $('#kgprice').show();
             $('#formula2').show();
        }
         
         
        
        if(data.link_to_purchase==1)
        {
             link_to_purchase.checked = true;
        }
       
        
        
        
   
           $scope.color=data.color;
           $scope.ys=data.ys;
           $scope.gsm=data.gsm;
           $scope.thickness=data.thickness;


     
    });
};


 


 

 $scope.imgpreview = function(){
    
      
        var product_id='<?php echo $id; ?>';
        $scope.imgpreviewimages(product_id);
   
};


$scope.imgresult = '';

$scope.imgpreviewimages = function(product_id){
           
            
                               $http({
                                method:"POST",
                                url:"<?php echo base_url() ?>index.php/products/findimages",
                                data:{'product_id':product_id}
                                }).success(function(data){
                                  
                                  
                                   $scope.namesDataoptonsimages = data;
                                  
                                  
                                 
                                 
                               }); 
            
            
 };
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 


     
$scope.imageuploadInproduct = function(){
              
                             var layout_plan= $('#layout_plan').val();
                             var lengthvalset= $('#lengthvalset').val();
                               
                              var product_id='<?php echo $id; ?>';
                              
                              $('#uploadbutton').html('Loading..');
              
                              var form_data = new FormData();  
                               angular.forEach($scope.files, function(file){  
                                    form_data.append('file[]', file);  
                               });  
                               $http.post('<?php echo base_url() ?>index.php/products/fileuplaodimgsave?id='+product_id+'&lengthval='+lengthvalset+'&layout_plan='+layout_plan, form_data,  
                               {  
                                    transformRequest: angular.identity,  
                                    headers: {'Content-Type': undefined,'Process-Data': false}  
                               }).success(function(response){  
                                   
                                 $scope.imgpreviewimages(product_id);
                                 
                                  $('#uploadbutton').html('Upload');
                                   
                                    
                               });  

     
 };
       
      

  $scope.fetchDatasize = function(){
    $http.get('<?php echo base_url() ?>index.php/products/fetch_data_size?product_id=<?php echo $id; ?>').success(function(data){
      $scope.namesData = data;
    });
  };

  $scope.fetchDatasizeoptions = function(){
    $http.get('<?php echo base_url() ?>index.php/products/fetch_data_size_options_check?product_id=<?php echo $id; ?>').success(function(data){
      $scope.namesDataoptons = data;
    });
  };



});

</script>


    <?php include ('footer.php'); ?>
</body>


