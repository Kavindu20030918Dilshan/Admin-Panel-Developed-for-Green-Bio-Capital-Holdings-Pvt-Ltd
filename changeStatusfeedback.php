<?php
session_start();
include "connection.php";
if (isset($_SESSION["au"])) {

  
Database::iud("UPDATE  `feedback` SET `status_id`  = '2' ");







} else {
?>
    <h1 style="justify-content: center; display: flex; margin-top: 350px;">You are not a valid Admin</h1>
<?php
}
