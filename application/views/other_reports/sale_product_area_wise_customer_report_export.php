<?php
?>
<table border="1">
<tr>
            <td style='font-weight:bold; text-align:center;' colspan="10"><?=$filename?></td>
        </tr>
        <tr>
          
        </tr>
    <tr style="font-weight:bold;">
        <td>S.no</td>
        <td>Customer</td>
        <td>Target</td>
        <td>Orders</td>
        <td>Sale Qty</td>
        <td>Sale Value</td>
        <td>Return Qty</td>
        <td>Return Value</td>
        <td>Net Sale Qty</td>
        <td>Net Sale Value</td>

    </tr>




    <?php foreach ($data as $key => $entry) {
    ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $entry->company_name != '' ? $entry->company_name : 'No Name' ?></td>
            <td><?= $entry->target_value_wise ?></td>
            <td><?= $entry->orders_count ? $entry->orders_count : 0 ?></td>
            <td><?= $entry->qty ? $entry->qty : 0 ?></td>
            <td><?= $entry->value ? $entry->value : 0 ?></td>
            <td><?= $entry->ret_qty ? $entry->ret_qty : 0 ?></td>
            <td><?= $entry->ret_value ? $entry->ret_value : 0 ?></td>
            <td><?= $entry->actual_qty ?  $entry->actual_qty : 0 ?></td>
            <td><?= $entry->actual_value ? $entry->actual_value : 0 ?></td>
        </tr>
    <?php }
    ?>


    <tr style="font-weight:bold;">
        <td colspan="3">Total</td>
        <td><?= $totals['orders_count'] ?></td>
        <td><?= $totals['qty'] ?></td>
        <td><?= $totals['value'] ?></td>
        <td><?= $totals['ret_qty'] ?></td>
        <td><?= $totals['ret_value'] ?></td>
        <td><?= $totals['actual_qty'] ?></td>
        <td><?= $totals['actual_value'] ?></td>
    </tr>



</table>