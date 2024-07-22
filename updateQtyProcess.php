<?php
session_start();
if(isset($_SESSION["au"])){

include "connection.php";


$ppid = $_POST["ppid"];
$pqty = $_POST["pqty"];





if (empty($pqty)) {
    echo ("Please Enter Product Quantity");
} else if (strlen($pqty) > 20) {
    echo ("Product Quantity Should Be Less Than 20 Characters");
}else if (!is_numeric($pqty)) {
    echo ("Please add a number");
} else{

     $rs = Database::search("SELECT * FROM `products` WHERE `id` = '".$ppid."' ");
     $num = $rs->num_rows;

     if ($num == 1) {
        
        Database::iud("UPDATE `products` SET `qty` = '".$pqty."'  WHERE `id` = '".$ppid."' ");
        echo("Success");

       
        
     } else {
        echo("Product Not Found");
     }
     
}

}else{
    ?>
    <script>
        window.location = "adminSignin.php";
    </script>
    <?php
}

