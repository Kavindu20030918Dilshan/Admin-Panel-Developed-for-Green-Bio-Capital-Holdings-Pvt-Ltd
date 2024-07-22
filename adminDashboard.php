<?php
session_start();
include "connection.php";

if (isset($_SESSION["au"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Green Bio Capital Holdings - Admin Dashboard</title>
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">



        <link href="admin_style/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top  header-transparent ">
            <div class="container d-flex align-items-center justify-content-between">
                <div>
                    <h3></h3>
                </div>

                <div class="logo">

                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>

                <nav id="navbar" class="navbar">
                    <ul>
                   
                        <li><a class="nav-link scrollto active" href="#hero"></a></li>
                        
                        <li><button type="button" class="btn  position-relative ms-5 "><span class="d-block d-md-block d-lg-none me-5 border border-1 border-lg-0  border-danger ">Notifications</span>
                                <i class="bi bi-bell text-danger fs-5 d-none d-lg-block  "></i>
                               
                                    <?php 
                                    $rs = Database::search("SELECT COUNT(`feedback`.`fid`) AS `notify_count`  FROM `feedback` INNER JOIN `status` ON `feedback`.`status_id` = `status`.`staus_id` WHERE `status`.`status_name` = 'Active';");
                                    $d = $rs->fetch_assoc();
                                    ?>
                                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $d["notify_count"]; ?></span>
                                    <?php
                                    ?>
                                 

                                
                            </button></li>
                            <a href="feedback.php"> <li  class="btn btn-outline-danger text-dark ">Feedbacks</li><a>


                            <a class="getstarted scrollto" onclick="adminLogOut();"><li>Logout</li></a>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->


        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center mt-5">

            <div class="container" style="margin-top: -50px;">
            
                <div class="row">

                <div class="align-items-center">
                        <h1 class="text-center">Admin Dashboard</h1>
                    </div>
                    <div class="align-items-center">
                        <h1 class="text-center fs-3 text-dark"><?php include "clock.php"; ?></h1>
                    </div>

                    
                    <!-- product table  -->
                    <div class="col-12 mt-4">

                        <table class="table table-striped">
                            <thead>
                                <div class="text-bg-dark text-center fs-4 fw-bold">
                                    Product Update
                                </div>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Of Weight</th>
                                    <th scope="col">Update</th>

                                </tr>
                            </thead>

                            <?php

                            $page_no;

                            if (isset($_GET["page"])) {
                                $page_no = $_GET["page"];
                            } else {
                                $page_no = 1;
                            }

                            $product_rs = Database::search("SELECT * FROM `products`");
                            $product_num = $product_rs->num_rows;
                            $results_per_page = 10;
                            $number_of_pages = ceil($product_num / $results_per_page);
                            $page_first_result = ((int)$page_no - 1) * $results_per_page;
                            $view_product_rs = Database::search("SELECT * FROM products LIMIT " . $results_per_page . " OFFSET " . $page_first_result);
                            $view_results_num = $view_product_rs->num_rows;

                            $c = 0;

                            ?>

                            <?php

                            while ($product_data = $view_product_rs->fetch_assoc()) {
                                $c += 1;
                            ?>

                                <tbody>
                                    <tr>

                                        <th scope="row"><?php echo $product_data["id"]; ?></th>
                                        <td><?php echo $product_data["product_name"]; ?></td>
                                        <td><?php echo $product_data["qty"]; ?></td>
                                        <td><?php echo $product_data["unit_of_weight"]; ?></td>
                                        <td><button class="btn btn-dark " onclick="openModal('<?php echo $product_data['id']; ?>');">Click</button></td>
                                    </tr>


                                </tbody>

                            <?php
                            }

                            ?>




                        </table>
                        <!-- Pagination -->
                        <div class="col-12 text-center d-flex justify-content-center align-items-center p-3">
                            <div class="pagination1">
                                <a href="<?php if ($page_no <= 1) {
                                                echo "#";
                                            } else {
                                                echo "?page=" . ($page_no - 1);
                                            } ?>">&laquo;</a>

                                <?php

                                for ($page = 1; $page <= $number_of_pages; $page++) {

                                    if ($page == $page_no) {
                                ?>
                                        <a href="<?php echo "?page=" . ($page); ?>" class="active"><?php echo $page; ?></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                <?php
                                    }
                                }

                                ?>
                                <a href="<?php if ($page_no >= $number_of_pages) {
                                                echo "#";
                                            } else {
                                                echo "?page=" . ($page_no + 1);
                                            } ?>">&raquo;</a>
                            </div>
                        </div>
                        <!-- Pagination -->

                    </div>
                    <!-- product table  -->



                    <div>

                        <!-- modal 1 -->

                        <div class="modal" tabindex="-1" id="openModalnew">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Product Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                 
                                    <div class="modal-body">
                                        <label class="form-label">Enter Product Quantity</label>

                                        <input type="text" class="form-control" id="pqty">


                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-dark" onclick="update();">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  modal 1-->











                    </div>

        </section><!-- End Hero -->










      







        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="admin_js/script.js"></script>

        <!-- <script>
            function inputNumber(){
               var num1 = document.getElementById("pqty").num;
            //    if (typeof num1 === 'number') {
                if(isNaN(num1) || num1 < 0 || num1 > 1000 ){
                    alert("Please Enter a number");
               }

            }
        </script> -->

    </body>

    </html>

<?php
} else {
?>

    <h1 style="justify-content: center; display: flex; margin-top: 350px;">You are not a valid Admin</h1>

<?php
}

?>