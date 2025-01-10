<?php

?>

<table border="1">
    <tr>
        <td style='font-weight:bold; text-align:center;' colspan="16"><?= $filename ?></td>
    </tr>
     
    <tr style="font-weight:bold;">
        <th style="width: 4%;" rowspan="2">S.no</th>
        <th rowspan="2">Salesman</th>
        <th rowspan="2">Overall Customers</th>
        <th rowspan="2">Billed Customers</th>
        <!-- <th rowspan="2">New Customers</th> -->
        <th colspan="2">No. of Regular Customers </th>
        <th colspan="2">No. of Irregular Customers </th>
        <th colspan="2">No. of Customers Not Filled </th>
        <th rowspan="2">Regular Sales</th>
        <th rowspan="2">Irregular Sales</th>
        <th rowspan="2">Not Filled Sales</th>
        <th rowspan="2">Total Sales</th>
        <th rowspan="2">Total Returns</th>
        <th rowspan="2">Actual Sales</th>
    </tr>
    <tr style="font-weight:bold;">
        
            <td >Overall</td>
            <td >Biilled</td>
            <td >Overall</td>
            <td >Billed</td>
            <td >Overall</td>
            <td >Billed</td>
             
    </tr>
   
    <?php foreach ($data as $key => $entry) {
    ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td ><?= $entry->name ?  $entry->name : 'No Name'?> </td>
            <td ><?= $entry->overall_customers ? ( $entry->overall_customers ) : 0?></td>
            <td ><?= $entry->customers ? ( $entry->customers ) : 0?></td>
            <td ><?= $entry->overall_regular_customers ? ( $entry->overall_regular_customers ) : 0?></td>
            <td ><?= $entry->regular_customers ? ( $entry->regular_customers ) : 0?></td>
            <td ><?= $entry->overall_irregular_customers ? ( $entry->overall_irregular_customers ) : 0?></td>
            <td ><?= $entry->irregular_customers ? ( $entry->irregular_customers ) : 0?></td>
            <td ><?= $entry->overall_not_filled_customers ? ( $entry->overall_not_filled_customers ) : 0?></td>
            <td ><?= $entry->not_filled_customers ? ( $entry->not_filled_customers ) : 0?></td>

            <td ><?= $entry->regular_customers_bill ? ( $entry->regular_customers_bill ) : 0?></td>
            <td ><?= $entry->irregular_customers_bill ? ( $entry->irregular_customers_bill ) : 0?></td>
            <td ><?= $entry->not_filled_customers_bill ? ( $entry->not_filled_customers_bill ) : 0?></td>
            <td ><?= $entry->total_bill ? ( $entry->total_bill ) : 0?></td>
            <td ><?= $entry->total_return ? ( $entry->total_return ) : 0?></td>
            <td ><?= $entry->total_actual ? ( $entry->total_actual ) : 0?></td>
        </tr>
    <?php
    }
    ?>
   
   <tr style="font-weight:bold;">
        <td colspan="2">Total</td>
        <td ><?= $totals['overall_customers']?></td>
            <td ><?= $totals['customers']?></td>
            <td ><?= $totals['overall_regular_customers']?></td>
            <td ><?= $totals['regular_customers']?></td>
            <td ><?= $totals['overall_irregular_customers']?></td>
            <td ><?= $totals['irregular_customers']?></td>
            <td ><?= $totals['overall_not_filled_customers']?></td>
            <td ><?= $totals['not_filled_customers']?></td>
            <td ><?= $totals['regular_customers_bill']?></td>
            <td ><?= $totals['irregular_customers_bill']?></td>
            <td ><?= $totals['not_filled_customers_bill']?></td>
            <td ><?= $totals['total_bill']?></td>
            <td ><?= $totals['total_return']?></td>
            <td ><?= $totals['total_actual']?></td>


    </tr>


</table>