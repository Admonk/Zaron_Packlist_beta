<?php



$theads = ["S.NO", "NAME", "ACCESSORIES", "ALUMINIUM", "CLEAT & SAGROD & L ANGLE & Z ANGLE", "DECKING SHEET", "EXTRA SHEET & ARCH", "FAN & BASE", "SHEET", "MULTI WALL", "POLY CARBONATE", "POLYNUM & XLPE", "PROFILE RIDGE & ARCH", "PUFF PANELS", "PURLIN", "SCREW", "SCREWS ACCESSORIES", "TILE SHEETS", "UPVC ITEMS", "STANDING SEAM", "STANDING SEAM CLIPS", "ROCK WOOL", "CONVERSION", "RENT", "HR PLATE", "LINER SHEET", "WALL SHEET","STEEL COIL","PUFF PANEL ACCESSORIES","PURLIN ACCESSORIES"];

$uoms = "R.FT, SQ.MTR, KG, SQ.MTR, SQ.MTR, NOS, SQ.MTR, SQ.MTR, SQ.MTR, SQ.FT, SQ.MTR, SQ.MTR, KG, NOS, NOS, SQ.MTR, NOS, SQ.MTR, NOS, SQ.MTR,, NOS, KG, SQ.MTR, SQ.MTR,KG,NOS,KG,KG,SQ.MTR";
$uoms = explode(",", $uoms);

$lineData = array(
    array("field_name" => "accessories", "cat_id" => 1),
    array("field_name" => "aluminium", "cat_id" => 36),
    array("field_name" => "cleat", "cat_id" => 41),
    array("field_name" => "decking_sheet", "cat_id" => 34),
    array("field_name" => "extra_sheet_arch", "cat_id" => 582),
    array("field_name" => "fan_base", "cat_id" => 17),
    array("field_name" => "sheet", "cat_id" => 3),
    array("field_name" => "multi_wall", "cat_id" => 20),
    array("field_name" => "poly_corbonate", "cat_id" => 19),
    array("field_name" => "polynum", "cat_id" => 13),
    array("field_name" => "profile_ridge_arch", "cat_id" => 32),
    array("field_name" => "puff_panels", "cat_id" => 30),
    array("field_name" => "purlin", "cat_id" => 5),
    array("field_name" => "screw", "cat_id" => 7),
    array("field_name" => "screw_accessories", "cat_id" => 9),
    array("field_name" => "tile_sheet", "cat_id" => 26),
    array("field_name" => "upvc_item", "cat_id" => 15),
    array("field_name" => "standing_seam", "cat_id" => 603),
    array("field_name" => "standing_seam_clips", "cat_id" => 604),
    array("field_name" => "rock_wool", "cat_id" => 11),
    array("field_name" => "conversion", "cat_id" => 581),
    array("field_name" => "rent", "cat_id" => 584),
    array("field_name" => "hr_plate", "cat_id" => 613),
    array("field_name" => "liner_sheet", "cat_id" => 590),
    array("field_name" => "wall_sheet", "cat_id" => 607),
    array("field_name" => "roll_sheet", "cat_id" => 593),
    array("field_name" => "puff_panel_accessories", "cat_id" => 618),
    array("field_name" => "purlin_accessories", "cat_id" => 616),
     array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
);


 function findArrayByFieldName($key, $salesData, $fieldName)
{

   
    foreach ($salesData as $data) {
        if (isset($data[$key]) && $data[$key] === $fieldName) {
            return $data; // Return the matching sub-array
        }
    }
    return null; // Return null if not found
}
 
?>

<table border="1">
    <!-- tHead -->
    <thead>
        <tr>
            <?php
            foreach ($theads as $key => $heading) {
                $styles = '';
                if ($key == 0) {
                    $styles = "position: sticky; left: 0; z-index: 2; top: 0;";
                } elseif ($key == 1) {
                    $styles = "padding: 0px 100px;position: sticky; left: 150px; z-index: 2;top: 0;";
                }
            ?>
                <th style="position: sticky;min-width: 150px;<?= $styles ?> top:0px;">
                    <?php echo $heading; ?>
                </th>
            <?php
            }
            ?>

        </tr>
        <tr>
            <th style="position: sticky; left: 0; z-index: 3; top: 50px;"></th>
            <th style="min-width: 150px;position: sticky; left: 150px; z-index: 3;top: 50px;">Unit of Measures</th>
            <?php
            foreach ($uoms as $key => $item) {

            ?>
                <th style="position: sticky;min-width: 150px; "><?= $item ?></th>
            <?php
            }
            ?>
        </tr>
    </thead>
    <?php
    foreach ($result[0] as $key => $el) {
    ?>
        <tbody>
            <tr class="primary" style="overflow:scroll;background-color:#FFD966;">
                <td colspan="2" style="position: sticky; left: 0; top: 0; z-index: 1;background-color:#FFD966;box-shadow: inset 1px 0px 0px 2px #e0e0e0;"><b><?= $el['sales_group_name'] ?></b></td>
                <td colspan="<?= count($lineData) ?> ">

                </td>
            </tr>


            <?php
            foreach ($el['salesperson'] as $person) {


            ?>
                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                    <td class="bg-white text-danger text-bold" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">
                        <b> Target</b>
                    </td>
                    <?php
                    foreach ($lineData as $item) {

                    ?>
                        <td>
                            <?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['target'] ?>
                        </td>
                    <?php

                    }
                    ?>

                </tr>

                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                    <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> <b><?= $person['sales_person_name'] ?></b></td>
                    <?php
                    foreach ($lineData as $key => $item) {

                    ?>
                        <td style="min-width: 150px;white-space: nowrap;"><?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['overall'] ?></td>
                    <?php
                    }
                    ?>

                </tr>

                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                    <td class="bg-white text-end text-danger" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> Returns </td>
                    <?php
                    foreach ($lineData as $key => $item) {

                    ?>
                        <td style="min-width: 150px;white-space: nowrap;"><?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['returns'] ?></td>
                    <?php
                    }
                    ?>

                </tr>

                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                    <td class="bg-white text-end" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;"> <b>Actual</b> </td>
                    <?php
                    foreach ($lineData as $key => $item) {

                    ?>
                        <td style="min-width: 150px;white-space: nowrap;"><?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['actual'] ?></td>
                    <?php
                    }
                    ?>

                </tr>

                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1;"></td>
                    <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1;">Required Target</td>
                    <?php
                    foreach ($lineData as $key => $item) {

                    ?>
                        <td class="text-info" style="min-width: 150px;white-space: nowrap;"><?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['required_target'] ?></td>
                    <?php
                    }
                    ?>

                </tr>

                <tr>
                    <td class="bg-white" style="position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                    <td class="bg-white" style="min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"></td>
                    <?php
                    foreach ($lineData as $key => $item) {

                    ?>
                        <td style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;background-color:<?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['status'] ? '#A9D08E' : '#FF8B8B' ?>">
                            <?= findArrayByFieldName('field_name', $person['sales_data'], $item['field_name'])['status'] ? 'AHEAD' : 'UNDER TARGET' ?></td>
                    <?php
                    }
                    ?>

                </tr>

            <?php
            }
            ?>
            <tr style="overflow:scroll;background-color:#cbffd3">
                <td style="position: sticky; left: 0; z-index: 1;background-color:#cbffd3"></td>
                <td style="min-width: 150px;position: sticky; left: 150px; z-index: 1;background-color:#cbffd3">TARGET TOTAL</td>
                <?php
                foreach ($lineData as $key => $item) {

                ?>
                    <td class="text-dark" style="min-width: 150px;white-space: nowrap;">

                        <?= findArrayByFieldName('cat_id', $el['totals'], $item['cat_id'])['target_total'] ?>
                    </td>
                <?php
                }
                ?>

            </tr>
            <tr style="overflow:scroll;background-color:#efefef">
                <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
                <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;">TOTAL</td>
                <?php
                foreach ($lineData as $key => $item) {
                ?>
                    <td style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;">
                        <?= findArrayByFieldName('cat_id', $el['totals'], $item['cat_id'])['actual_total'] ?>
                    </td>
                <?php
                }
                ?>

            </tr>
        </tbody>
    <?php
    }
    ?>
    <tfoot>
        <tr style="overflow:scroll;background-color:#efefef">
            <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
            <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>Topaaz</b></td>
            <?php
            foreach ($lineData as $key => $item) {
            ?>
                <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                        <?=
                        findArrayByFieldName('cat_id', $result['topaaz'], $item['cat_id'])['actual']
                        ?>

                    </b></td>
            <?php
            }
            ?>

        </tr>



        <tr style="overflow:scroll;background-color:#efefef">
            <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
            <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>Arasfirma</b></td>
             <?php
            foreach ($lineData as $key => $item) {
            ?>
                <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>
                        <?=
                        findArrayByFieldName('cat_id', $result['arasf'], $item['cat_id'])['actual']
                        ?>

                    </b></td>
            <?php
            }
            ?>
        </tr>



        <tr style="overflow:scroll;background-color:#efefef">
            <td style="background-color:#efefef;position: sticky; left: 0; z-index: 1; border-bottom:1px solid #000;"></td>
            <td style="background-color:#efefef;min-width: 150px;position: sticky; left: 150px; z-index: 1; border-bottom:1px solid #000;"><b>GRAND TOTAL</b></td>
            <?php
            foreach ($lineData as $key => $item) {
            ?>
                <td class="text-danger" style="min-width: 150px;white-space: nowrap; border-bottom:1px solid #000;"><b>

                        <?=
                        findArrayByFieldName('cat_id', $result['totals'], $item['cat_id'])['actual_total']
                        ?>

                    </b></td>
            <?php
            }
            ?>
        </tr>
    </tfoot>
</table>