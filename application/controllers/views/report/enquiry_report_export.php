<?php
$filename='enquiry_report_'.$formdate; 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
?>


 <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"   border="yes" style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                           <thead style="background: #fff;">
                        
                       </thead>
                       
                       
                       <tr >


                          <th></th>
                          <th></th>
                          <th></th>
                         
                          
                          <th style="text-align: center;"  colspan="5">OLD TOTAL ENQUIRY</th>
                          
                          <th style="text-align: center;"  colspan="5">ENQUIRY <?php echo $formdate; ?></th>
                          <th style="text-align: center;"  colspan="5">TOTAL ENQUIRY</th>
                          <th style="text-align: center;"  colspan="5">PERCENTAGE</th>
                         
                          
                         
                        </tr>
                   
                        <tr style="position: sticky;top: 0;background: #e4e9e9;font-size: 9.5px;line-height:30px;">


                          <th>No</th>
                          <th style="width:10%;">Sales Group</th>
                          <th style="width:400px;">Sales Team</th>
                         
                          <th style="width:300px;" >Enquiry</th>
                          <th style="width:300px;" >Converted </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Today</th>
                          <th style="width:300px;" >Converted  </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Today</th>
                          <th style="width:300px;" >Converted  </th>
                          <th style="width:300px;" >Missing </th>
                          <th style="width:300px;" >Bills</th>
                          <th style="width:300px;" >Pending</th>
                          
                          
                          <th style="width:300px;" >Convertion %</th>
                          <th style="width:300px;" >Missed %</th>
                          <th style="width:300px;" >Pending  %</th>
                          <th style="width:300px;" >Billing %</th>
                     
                         
                        </tr>
                     
                      
                      
                             
                        <tbody>
                            
                            <?php
                            
                            foreach($res as $names)
                            {
                                ?>
                                
                                
                                <tr  class="trpoint" >
                          
                                <td><?php echo $names['no']; ?></td>
                                <td><b style="color:#ff5e14;"><?php echo $names['sales_group_name']; ?></b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                     <td></td>
                                      <td></td>
                                       <td></td>
                                        <td></td>
                                         <td></td>
                                          <td></td>
                                           <td></td>
                                            <td></td>
                                             <td></td>
                                              <td></td>
                                              <td></td>
                                           <td></td>
                                            <td></td>
                                             <td></td>
                                              <td></td>
                                              
                            <tr>
                                    <?php
                            
                            foreach($names['subarray'] as $namesvv)
                            {
                                ?>
                                <tr >
                                    <td></td>
                                    <td></td>
                                    <td> <?php echo $namesvv['sales_team']; ?></td>
                                    <td><span><?php if($namesvv['totalcount']>0) {  echo $namesvv['totalcount']; } ?></span></td>
                                    <td><span><?php if($namesvv['totalconvert']>0) {  echo $namesvv['totalconvert']; } ?></span></td>
                                    <td><span><?php if($namesvv['totalmissing']>0) {  echo $namesvv['totalmissing']; } ?></span></td>
                                    <td><span><?php if($namesvv['totalbilling']>0) {  echo $namesvv['totalbilling']; } ?></span></td>
                                    <td><span><?php if($namesvv['totalbillingpending']>0) {  echo $namesvv['totalbillingpending']; } ?></span></td>
                                    <td><span><?php if($namesvv['today_totalcount']>0) {  echo $namesvv['today_totalcount']; } ?></span></td>
                                    <td><span><?php if($namesvv['today_totalconvert']>0) {  echo $namesvv['today_totalconvert']; } ?></span></td>
                                    <td><span><?php if($namesvv['today_totalmissing']>0) {  echo $namesvv['today_totalmissing']; } ?></span></td>
                                    <td><span><?php if($namesvv['today_totalbilling']>0) {  echo $namesvv['today_totalbilling']; } ?></span></td>
                                    <td><span><?php if($namesvv['today_totalbillingpending']>0) {  echo $namesvv['today_totalbillingpending']; } ?></span></td>
                                    <td><span><?php if($namesvv['total_totalcount']>0) {  echo $namesvv['total_totalcount']; } ?></span></td>
                                    <td><span><?php if($namesvv['total_totalconvert']>0) {  echo $namesvv['total_totalconvert']; } ?></span></td>
                                    <td><span><?php if($namesvv['total_totalmissing']>0) {  echo $namesvv['total_totalmissing']; } ?></span></td>
                                    <td><span><?php if($namesvv['total_totalbilling']>0) {  echo $namesvv['total_totalbilling']; } ?></span></td>
                                    <td><span><?php if($namesvv['total_totalbillingpending']>0) {  echo $namesvv['total_totalbillingpending']; } ?></span></td>
                                    <td><span><?php if($namesvv['convertion']>0) {  echo $namesvv['convertion']; } ?></span></td>
                                    <td><span><?php if($namesvv['missed']>0) {  echo $namesvv['missed']; } ?></span></td>
                                    <td><span><?php if($namesvv['missed']>0) {  echo $namesvv['missed']; } ?></span></td>
                                    <td><span><?php if($namesvv['pending']>0) {  echo $namesvv['pending']; } ?></span></td>
                                    <td><span><?php if($namesvv['billing']>0) {  echo $namesvv['billing']; } ?></span></td>
                                  
                                  </tr>
                                     <?php
                            }
                            
                            ?>
                            
                            
                                <?php
                            }
                            
                            ?>
                            
                                
                                 
                        
                      
                      </tbody>
                      
                       
                      
                      
</table>



