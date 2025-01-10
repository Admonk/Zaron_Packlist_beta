<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
echo $a="SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
$a = mysqli_query($conn, $a);