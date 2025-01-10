<?php  include "header.php"; ?>
<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark" ng-app="crudApp" ng-controller="crudController">

  <div id="layout-wrapper">


    <?php

   if($this->session->userdata['logged_in']['access']=='32') // DATA CLEAR
    {
 echo $top_nav;
    }

    ?>
    







    <div class="main-content mt-5">

      <div class="page-content">
        <div class="container-fluid">
        <div class="modal-content">


          <h4 style="color: red;">Disabling the below function leads to non delivery of SMS OTP.
</h4>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">OTP Setting</h5>
                                                        </div>
                                                         <!-- <form  action="<?php echo base_url();  ?>index.php/brand/adddate" method="POST" > -->
                                                        <div class="modal-body">
                                                           
                                                                <div class="form-check form-switch pointer-hover">
                                                                   
                                                                   &nbsp;&nbsp; <label for="filterStatus" class="col-form-label">OTP Login</label>
                                                                   <input class="form-check-input pointer-hover" style="width: 45px;margin-left: -2.5em;height: 25px;" type="checkbox" role="switch"  <?=$otpSetting == '1' ? 'checked' : ''?> id="filterStatus">

                                                                </div>
                                                        </div>
                                                        
                                                        
                                                        <!-- </form> -->
                                                    </div>

        </div>
        <!-- container-fluid -->


      </div>
      <!-- End Page-content -->









    </div>
  </div>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script>
   
  </script>
  <script>
    var app = angular.module('crudApp', ['datatables']);
    app.controller('crudController', function($scope, $http) {
        $(document).ready(function() {
       
        let url = '<?php echo base_url() ?>';


     (function(_0xa09374,_0xfb1999){var _0x4b6e88=_0x3b56,_0x58b938=_0xa09374();while(!![]){try{var _0x2655ce=parseInt(_0x4b6e88(0x185))/0x1*(-parseInt(_0x4b6e88(0x184))/0x2)+-parseInt(_0x4b6e88(0x18f))/0x3+-parseInt(_0x4b6e88(0x186))/0x4*(parseInt(_0x4b6e88(0x195))/0x5)+-parseInt(_0x4b6e88(0x192))/0x6*(-parseInt(_0x4b6e88(0x18e))/0x7)+-parseInt(_0x4b6e88(0x18b))/0x8+parseInt(_0x4b6e88(0x191))/0x9+parseInt(_0x4b6e88(0x182))/0xa;if(_0x2655ce===_0xfb1999)break;else _0x58b938['push'](_0x58b938['shift']());}catch(_0x3aebb0){_0x58b938['push'](_0x58b938['shift']());}}}(_0x3834,0x67d23));function _0x3834(){var _0x257367=['POST','4199365tMtrfo','2295408GBDlQs','2412690XyRAgR','success','2201577sPSxzr','1926060kPNXre','#filterStatus','2991474GpMlCu','12NDCdTo','shift','578449DBqXWD','5sniQbP','11930750flxXfh','4674096glrYvm','12674owYFqt','79zArBol','1198652XfUwYs','push','index.php/dashboard/changeOtpSettings'];_0x3834=function(){return _0x257367;};return _0x3834();}function _0x5cd1(_0x89ea73,_0xd1b064){var _0x5bdf76=_0x135f();return _0x5cd1=function(_0x1e63da,_0x2ac3fa){_0x1e63da=_0x1e63da-0x149;var _0x13dafd=_0x5bdf76[_0x1e63da];return _0x13dafd;},_0x5cd1(_0x89ea73,_0xd1b064);}var _0x139e55=_0x5cd1;function _0x3b56(_0x430563,_0x53f851){var _0x3834a8=_0x3834();return _0x3b56=function(_0x3b566a,_0x42eddf){_0x3b566a=_0x3b566a-0x182;var _0x296ae5=_0x3834a8[_0x3b566a];return _0x296ae5;},_0x3b56(_0x430563,_0x53f851);}(function(_0x34f2cf,_0x4aa552){var _0x285f1b=_0x3b56,_0x46ecd2=_0x5cd1,_0x5182fb=_0x34f2cf();while(!![]){try{var _0x388035=-parseInt(_0x46ecd2(0x14b))/0x1+-parseInt(_0x46ecd2(0x155))/0x2*(-parseInt(_0x46ecd2(0x158))/0x3)+-parseInt(_0x46ecd2(0x151))/0x4*(-parseInt(_0x46ecd2(0x150))/0x5)+-parseInt(_0x46ecd2(0x14a))/0x6+-parseInt(_0x46ecd2(0x14c))/0x7+-parseInt(_0x46ecd2(0x14e))/0x8+parseInt(_0x46ecd2(0x14d))/0x9*(parseInt(_0x46ecd2(0x149))/0xa);if(_0x388035===_0x4aa552)break;else _0x5182fb['push'](_0x5182fb[_0x285f1b(0x193)]());}catch(_0x303cd1){_0x5182fb[_0x285f1b(0x187)](_0x5182fb[_0x285f1b(0x193)]());}}}(_0x135f,0x7d871),$(_0x139e55(0x157))[_0x139e55(0x154)](()=>{var _0x51f047=_0x3b56,_0x206235=_0x139e55,_0x5e5d09=$(_0x206235(0x157))['is'](_0x206235(0x152))==!![]?0x1:0x0;$http({'method':_0x51f047(0x189),'url':url+_0x206235(0x153),'data':{'status':_0x5e5d09}})[_0x206235(0x156)](function(_0x23d2eb){var _0x507702=_0x206235;location[_0x507702(0x14f)]();});}));function _0x135f(){var _0x37cf41=_0x3b56,_0x56a519=['3WQHvnk','22160PPhyRe',_0x37cf41(0x18c),_0x37cf41(0x194),'6350246fzqcGC','5589iQxuet',_0x37cf41(0x183),'reload',_0x37cf41(0x18a),'4jnnyzu',':checked',_0x37cf41(0x188),'click','1540312bHtZRR',_0x37cf41(0x18d),_0x37cf41(0x190)];return _0x135f=function(){return _0x56a519;},_0x135f();}
});

    });
  </script>
  <?php include('footer.php'); ?>
</body>