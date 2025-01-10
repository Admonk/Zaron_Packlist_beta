<?php

?>

<table border="1">
    <tr>
        <td style='font-weight:bold; text-align:center;' colspan="8"><?= $filename ?></td>
    </tr>
    <tr>

    </tr>
    <tr style="font-weight:bold;">
        <th>S.no</th>
        <th>Order No</th>
        <th>Sale Qty</th>
        <th>Sale Value</th>
        <th>Return Qty</th>
        <th>Return Value</th>
        <th>Net Sale Qty</th>
        <th>Net Sale Value</th>
    </tr>
    <?php foreach ($data as $key => $entry) {
    ?>
        <tr>
            <td><?=$key+1?></td>
            <td><?=$entry->order_no?></td>
            <td ><?=$entry->qty ? ($entry->qty ) : 0?></td>
            <td ><?=$entry->value ? ($entry->value ) : 0?></td>
            <td ><?=$entry->ret_qty ? ($entry->ret_qty ) : 0?></td>
            <td ><?=$entry->ret_value ? ($entry->ret_value ) : 0?></td>
            <td ><?=$entry->actual_qty ? ($entry->actual_qty ) : 0?></td>
            <td ><?=$entry->actual_value ? ($entry->actual_value ) : 0?></td>
        </tr>
    <?php
    }
    ?>
   <tr style="font-weight:bold;">
        <td colspan="2">Total</td>
        <td><?= $totals['brand_qty'] ?></td>
        <td><?= $totals['brand_value'] ?></td>
        <td><?= $totals['brand_ret_qty'] ?></td>
        <td><?= $totals['brand_ret_value'] ?></td>
        <td><?= $totals['brand_actual_qty'] ?></td>
        <td><?= $totals['brand_actual_value'] ?></td>
    </tr>



</table>