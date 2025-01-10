 <?php

$headsforMonth = ['Billed Customers', 'Total Customers', 'No. of Bills', 'Percentage (Billed Customers / Overall Customers'];
$headKeys = ['customers', 'customers_create', 'bill_count', 'percentage'];
$headKeysSH = ['customers', 'customers_create', 'total_orders', 'percentage'];

function filterNumericKeys($data, $el) {
  $filteredData = array_filter(
    array_keys($data[$el]),
    function ($key) {
      return is_numeric($key);
    }
  );

  $result = [];
  foreach ($filteredData as $key) {
    $result[$key] = $data[$el][$key];
  }

  return $result;
}


?>



<table border="1">
    <!-- Head -->
    <thea>
        <tr>
            <th colspan="2">Month</th>
            <?php foreach ($months as $month) { ?>
                <th colspan="4"><?= $month['str'] ?></th>
            <?php } ?>
        </tr>
        </thead>

        <thead>
        <tr>
            <th>S.no</th>
            <th>Salesman</th>
            <?php foreach ($months as $month) { ?>
                <?php foreach ($headsforMonth as $head) { ?>
                    <th>
                        <?= $head ?>
                    </th>
                <?php } ?>
            <?php } ?>



        </tr>
        <tr>
            <th colspan="2">Total</th>

            <?php foreach ($months as $month) { ?>
                <?php foreach ($headKeys as $head) { ?>
                    <th>
                        <?= $head == 'percentage' ? round($totals[$head . '_' . $month['no']], 2) . ' %' : $totals[$head . '_' . $month['no']] ?>
                    </th>
                <?php } ?>
            <?php } 
            $i = 1;
           

            ?>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $entry) { ?>
           <tr >
               <td style="text-align: center"><?=$i?></td>
               <td ><b> <?=$key == "" ? 'Others' : $key?> </b> </td> 
                <?php foreach ($months as $month) { ?>
                    <?php foreach ($headKeysSH as $head) { ?>
                        <th>
                            <?= $head == 'percentage' ? round($entry[$head . '_' . $month['no']], 2) . ' %' : $entry[$head . '_' . $month['no']] ?>
                        </th>
                    <?php } ?>
                <?php }
                    $i++;
                 ?>
           </tr>
  			<?php 
  		}
  		?>
        </tbody>
</table>