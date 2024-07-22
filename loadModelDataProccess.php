<?php
session_start();
if(isset($_SESSION["au"])){

    require "connection.php";

    $id = $_POST["id"];

    $rs = Database::search("SELECT * FROM `products` WHERE `id` = '".$id."' " );
    $num = $rs->num_rows;

    if ($num > 0) {
        
    }

}else{
    ?>
    <script>
        window.location = "adminSignin.php";
    </script>
    <?php
}





?>