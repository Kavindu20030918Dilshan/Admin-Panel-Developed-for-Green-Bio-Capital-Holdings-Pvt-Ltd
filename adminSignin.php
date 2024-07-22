<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Bio Capital Holdings - Admin SignIn</title>
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


    <link rel="stylesheet" href="admin_style/style.css">
</head>

<body>
    <!-- adminlogin  -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div data-bs-theme="dark">
                    <div class="col-12 col-md-6 offset-md-3 p-4 box">
                        <div class="mb-3">

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <img src="assets/img/testimonials/testimonials-5.jpg" class="img-fluid" style="height: 200px;" alt="admin">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-2 fw-bold fs-4">
                                <label> Admin Login</label>
                            </div>

                            <div class="d-flex justify-content-center">
                                <label for="exampleFormControlInput1" class="form-label text-center text-dark fw-bold "></label>
                            </div>
                            <input type="email" class="form-control" placeholder="Ex: admin@gmail.com" id="e">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary mt-3 col-5" onclick="adminVerification();">Send Verification Code</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- End Hero -->



    <!-- adminlogin  -->



    <!-- modal -->

    <div class="modal" tabindex="-1" id="verificationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter Your Verification Code</label>
                    <input type="text" class="form-control" id="vcode">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <!--  modal-->








    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script src="admin_js/script.js"></script>
</body>

</html>