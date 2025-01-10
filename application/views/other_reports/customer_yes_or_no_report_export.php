<table border='1'>
	<tr>
		<td colspan="25" style="font-size: larger;text-align: center;"><b><?= $filename ?></b></td>
	</tr>
	 <tr style="position: sticky;top: 0;background: #dfdfdf;">


                          <th>No</th>
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Area</th>
                          <th>Competitor</th>
                          <th>Open/Close</th>
                          <th>C</th>
                          <th>Q</th>
                          <th>P</th>
                          <th>S</th>
                          <th>F</th>
                          
<?php
foreach($ignore as $val) {
?>
<th><?=$val['month']?></th>
<?php 
}
?>
                          <th>S.A</th>
                          <th>B.A</th>
                          
                        </tr>
	<?php
	foreach ($data as $key => $value) {
	?>
		<tr>
			<td colspan="<?=   count($ignore)?>" class="text-start" style="font-size: larger;">Sales Member - <b><?= $value['key'] ?> </b><?=$value['orders_count']?> Order<?=$value['orders_count']>1?'s':''?> from (<?=$value['customers_count']?> Customer<?=$value['customers_count']>1?'s':''?>)</td>
		</tr>

	<?php
          foreach ($value['data'] as $key => $value1) {
          	 ?>
          	 <tr>
							<td><?=$value1['no']?></td>
                           <td> <?=$value1['customername']?> </td>
                           <td> '<?=$value1['customerphone']?>' </td>
                          
                           <td> <?=$value1['area']?></a></td>
                          
                            <td> <?=$value1['competitor']?></a></td>
                          
                           <td> <?=$value1['factory_workshop']?></a></td>
                           
                          <td><?=$value1['cc']?></td>
                          <td><?=$value1['pp']?></td>
                          <td><?=$value1['dd']?></td>
                          <td><?=$value1['qq']?></td>
                          <td><?=$value1['rr']?></td>


                       <?php
foreach($ignore as $val) {
?>
<th><?=$value1[$val['monthFull']]?></th>
<?php 
}
?>
                        
                        
                          
                           <td><?=$value1['sa']?></td>
                           <td><?=$value1['ba']?></td>
                        </tr>

                        <?php
          }


	 }  
	 ?>

</table>