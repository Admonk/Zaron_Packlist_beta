 <?php
 
?>
 
<table border="1">
<tr>
            <td style='font-weight:bold; text-align:center;' colspan="9"><?=$filename?></td>
        </tr>
        <tr>
          
        </tr>
        <tr style="font-weight:bold;">
            <td>S.no</td>
            <td>Product Name</td>
            <td>Order No</td>
            <td>Sale Qty</td>
            <td>Sale Value</td>
            <td>Return Qty</td>
            <td>Return Value</td>
            <td>Net Sale Qty</td>
            <td>Net Sale Value</td>
        </tr>
        <?php foreach ($data as $key => $entry) 
        {
        ?>
        <tr>
        <td><?=$key+1?></td>
        <td><?=$entry->product_name ? $entry->product_name : $entry->categories?></td>
        <td><?='-'.$entry->order_no?></td>
        <td><?=$entry->qty?></td>
        <td><?=$entry->value?></td>
        <td><?=$entry->ret_qty ? $entry->ret_qty : 0?></td>
        <td><?=$entry->ret_value ? $entry->ret_value : 0?></td>
        <td><?=$entry->actual_qty ? $entry->actual_qty : 0?></td>
        <td><?=$entry->actual_value ? $entry->actual_value : 0?></td>
        </tr>
        <?php 
        }
        ?>
    <tr style="font-weight:bold;">
        <td colspan="3">Total</td>
        <td><?= $totals['brand_qty'] ?></td>
        <td><?= $totals['brand_value'] ?></td>
        <td><?= $totals['brand_ret_qty'] ?></td>
        <td><?= $totals['brand_ret_value'] ?></td>
        <td><?= $totals['brand_actual_qty'] ?></td>
        <td><?= $totals['brand_actual_value'] ?></td>
    </tr>
   


</table>