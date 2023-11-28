
<?php
    include 'config.php';
    // xử lý yêu cầu đăng kí khi đẩy form
    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // LẤY THÔNG TIN TỪ FORM
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // kiểm tra người dùng đã tồn tại hay chưa
        $check_query = "SELECT *FROM user_client WHERE username = '$username'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            $message = ' <h2 class="section-title px-5"><span class="px-2">tài khoản đã đăng kí</span></h2>';
        } else {
            // thêm tài khoản vào cơ sở dữ liệu
            $insert_query = "INSERT INTO user_client (fullname,username,phone, password, email) VALUES ('$fullname', '$username','$phone', '$password', '$email')";
            if ($conn->query($insert_query) == TRUE) {
                $message = '<h2 class="section-title px-5" style="color: green;"><span class="px-2">Đăng ký thành công</span></h2> <br> Quay lại đăng nhập <a href="Login.php"> tại đây</a>';
            } else {
                $message = ' <h2 class="section-title px-5" style="color: red;"><span class="px-2">Đăng ký thất bại</span></h2>';
            }
        }
    }

    // đóng kết nối
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Đồng hồ đeo tay chính hãng 100%, giá rẻ giảm 50%, góp 0% </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        
        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    
        
        <!-- Customized Bootstrap Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/login_re.css">
    </head>

<body>
    <header id="header">
        <!-- Topbar Start -->
        <div class="header-top bg-gray-900 py-2">
            <div class="container">
                <div class="row py-2">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-light" href="">FAQs</a>
                            <span class="text-muted px-2">|</span>
                            <a class="text-light" href="">Help</a>
                            <span class="text-muted px-2">|</span>
                            <a class="text-light" href="">Support</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-light px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-light px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-light pl-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <div class="header-inner py-4 bg-gray-900">
            <div class="container">
                <div class="row align-items-center py-3">
                    <div class="col-lg-3 d-none d-lg-block">
                        <a href="../index.php" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-6 text-left search-inner">
                        <form action="search.php" class="w-100 position-relative" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...." name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary text-light"  name="search-on">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-6 text-right">
                        <a href="" class="btn" style="font-size: 20px">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-light">0</span>
                        </a>
                        <a href="cart.php" class="btn" style="font-size: 20px">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge sum-cart text-light">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Navbar Start -->
        <div class="header-nav bg-gray-900">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg bg-gray-900 navbar-light py-3 py-lg-0 px-0">
                            <a href="../index.php" class="text-decoration-none d-block d-lg-none">
                                <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span></h2>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                    <a href="../index.php" class="nav-item nav-link position-relative text-uppercase mx-4">Home</a>
                                    <a href="shop.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop</a>
                                    <a href="detail.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop Detail</a>
                                    <a href="cart.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shopping Cart</a>
                                    <a href="checkout.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Checkout</a>
                                    <a href="contact.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Contact</a>
                                    <a href="Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4 active">Login</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </header>


    <!-- Page Header Start -->
    <div class="container-fluid bg-gray-200 mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">LOG IN</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Login</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Register</span></h2>
        </div>
        <div class="text-center mb-4">
            <?php echo $message; ?>
            <!-- <h2 class="section-title px-5"><span class="px-2">Register</span></h2> -->
        </div>
        
        <div class="main_container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" class="form-login" id="form-1">
                <div class="form-header">
                    <h3 class="form-heading">ĐĂNG KÝ</h3>
                </div>

                <div class="form-group">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input id="fullname" name="fullname" type="text" placeholder="VD: Tôn Long Tiến" class="form-control1" required>
                    <i class="fa-solid fa-user form-user"></i>
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <input id="username" name="username" type="text" placeholder="VD: longtien1998" class="form-control1" required>
                    <i class="fa-solid fa-user form-user"></i>
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input id="phone" name="phone" type="number" placeholder="VD: 0982268784" class="form-control1" required>
                    <i class="fa-solid fa-user form-user"></i>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Tên đăng nhập</label>
                    <input id="email" name="email" type="text" placeholder="VD: longtien1998@gmail.com"
                        class="form-control1" required>
                    <i class="fa-solid fa-user form-user"></i>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu"
                        class="form-control1" required>
                    <i class="fa-solid fa-user-lock form-lock"></i>
                    <span class="form-message"></span>
                    <i class="fa-solid fa-eye-slash form-eye-slash"></i>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                        type="password" class="form-control1" required>
                    <i class="fa-solid fa-user-lock form-lock"></i>
                    <span class="form-message"></span>
                    <i class="fa-solid fa-eye-slash form-eye-slash"></i>
                </div>
                <p class="register">
                    Bạn đã là thành viên Fridayshopping?
                    <a href="Login.php" class="register-link">Đăng nhập</a>
                </p>
                <button class="form-submit" type="submit" name="dangky">Đăng ký</button>
            </form>
            <div class="icon">
                <img src="/image/logo.png" alt="">
            </div>
        </div>
    </div>
    <!-- Contact End -->


   <!-- Footer Start -->
   <div class="footer bg-gray-900">
    <div class="container text-light mt-5 pt-5">
        <div class="row  pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">FridayShopping</span></h2>
                </a>
               
                <p class="mb-2"><i class="fa fa-envelope text-light mr-3"></i>tonlongtien1998@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-light mr-3"></i>0982268784</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-light mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-light mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-light" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-light mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-light mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-light mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-light mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-light" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-light mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>

        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.isRequired('#email'),
                Validator.isEmail('#email'),
                Validator.isRequired('#username'),
                Validator.isRequired('#avatar'),
                Validator.minLength('#password', 8),
                Validator.isRequired('#password_confirmation'),
                Validator.isRequired('#province'),
                Validator.isConfirmed('#password_confirmation', function () {
                    return document.querySelector('#form-1 #password').value;
                }, 'Mật khẩu nhập lại không chính xác'),
                Validator.isRequired('input[name="gender"]'),
            ],
            onSubmit: function (data) {
                // Call API
                console.log(data);
            }
        });

    </script>
</body>

</html>