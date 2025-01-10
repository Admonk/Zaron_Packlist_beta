<?php

?>

<table border="1">
    <tr>
        <td style='font-weight:bold; text-align:center;' colspan="9"><?= $filename ?></td>
    </tr>
    <tr>

    </tr>
    <tr style="font-weight:bold;">
        <th>S.no</th>
        <th>Customer Name</th>
        <th>Regular or Irregular</th>
        <th>Regular Sales</th>
        <th>Irregular Sales</th>
        <th>Not Filled Sales</th>
        <th>Regular Returns</th>
        <th>Irregular Returns</th>
        <th>Not Filled Returns</th>
        <th>Net Sales</th>
    </tr>
    <?php foreach ($data as $key => $entry) {
    ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $entry->name ?></td>
            <td><?= isset($entry->regular)? $entry->regular : 'NULL' ?></td>
            <td><?= $entry->regular_customers_bill ? $entry->regular_customers_bill : 0 ?></td>
            <td><?= $entry->irregular_customers_bill ? $entry->irregular_customers_bill : 0 ?></td>
            <td><?= $entry->not_filled_customers_bill ? $entry->not_filled_customers_bill : 0 ?></td>
            <td><?= $entry->regular_customers_return ? $entry->regular_customers_return : 0 ?></td>
            <td><?= $entry->irregular_customers_return ? $entry->irregular_customers_return : 0 ?></td>
            <td><?= $entry->not_filled_customers_return ? $entry->not_filled_customers_return : 0 ?></td>
            <td><?= $entry->net_sales ? $entry->net_sales : 0 ?></td>
        </tr>
    <?php
    }
    ?>
    <tr style="font-weight:bold;">
        <td colspan="3">Total</td>
        <td><?= $totals['regular_customers_bill'] ?></td>
        <td><?= $totals['irregular_customers_bill'] ?></td>
        <td><?= $totals['not_filled_customers_bill'] ?></td>
        <td><?= $totals['regular_customers_return'] ?></td>
        <td><?= $totals['irregular_customers_return'] ?></td>
        <td><?= $totals['not_filled_customers_return'] ?></td>
        <td><?= $totals['net_sales'] ?></td>
    </tr>



</table>