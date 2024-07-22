<?php
session_start();
include "connection.php";

 $pid1 = $_POST["pid"];
// echo($pid);
$rs = Database::search("SELECT * FROM `bio_db`.`products` WHERE `id` = '".$pid1."' ");
$num = $rs->num_rows;

if ($num == 1) {
    $d = $rs->fetch_assoc();
    $_SESSION["pid"] = $d;
    // echo("Success");
    echo $d;  
     
}



?>