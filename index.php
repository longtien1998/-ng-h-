
<?php
include 'frontend/config.php';
// khởi tạo biên session

session_start();
// kiểm tra xem sessionuser có tồn tại không ?
$user = '';
if (isset($_SESSION["user"])) {
    $query = "SELECT * FROM user_admin WHERE username='$username' ";

    // Thực thi truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả trả về
    if (mysqli_num_rows($result) > 0) {

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome Admin' . $_SESSION["user"] . '<br> <a href="frontend/logout.php"  tite="Logout">Logout.</a> </div>';
    } else {
        $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome ' . $_SESSION["user"] . '<br> <a href="frontend/logout.php"  tite="Logout">Logout.</a> </div>';
    }
} else $user = '<a href="frontend/Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4 ">Login</a>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đồng hồ đeo tay chính hãng 100%, giá rẻ giảm 50%, góp 0%</title>
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
    <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/db4ae7b83e.js" crossorigin="anonymous"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="frontend/css/main.css">
    <link href="frontend/css/style.css" rel="stylesheet">
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
                        <a href="" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-6 col-12 text-left search-inner">
                        <form action="frontend/search.php" class="w-100 position-relative" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...." name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary text-light" name="search-on">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-12 d-flex align-items-center justify-content-lg-end justify-content-sm-between">
                        <a href="" class="btn" style="font-size: 20px">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-light">0</span>
                        </a>
                        <a href="frontend/cart.php" class="btn" style="font-size: 20px">
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
                            <a href="" class="text-decoration-none d-block d-lg-none">
                                <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span></h2>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                    <a href="index.php" class="nav-item nav-link position-relative text-uppercase mx-4 active">Home</a>
                                    <a href="frontend/shop.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop</a>
                                    <a href="frontend/detail.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop Detail</a>
                                    <a href="frontend/cart.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shopping Cart</a>
                                    <a href="frontend/checkout.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Checkout</a>
                                    <a href="frontend/contact.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Contact</a>
                                    <!-- <a href="login.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Login</a> -->
                                    <?php echo $user; ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
    </header>

    <div class="slider-main bg-dark-200 mt-0 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div id="header-slider" class="slick slide w-100">
                        <div class="slider-inner position-relative">
                            <div class="slider-item slider-item-1 d-flex justify-content-between">
                            </div>

                            <div class="slider-item slider-item-2 d-flex justify-content-between">
                            </div>
                            <div class="slider-item slider-item-3 d-flex justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Products Start -->
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Featured products</span></h2>
        </div>
        <div class="row pb-3">

            
            <?php
                
                // truy vấn danh sách các sản phẩm
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);
                $i="1";
            // hiển thị danh sách sản phẩm từ cơ sở dữ liệu
            while ($row = mysqli_fetch_assoc($result) ) {
                echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" data-index="'.$i.'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="product-thumbnail img-fluid w-100" src="backend/' . $row['urlimage'] . '" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="product-name text-truncate mb-3">' . $row['productname'] . '</h6>
                                <div class="d-flex justify-content-center">
                                    <h6 class="product-price">$' . $row['price'] . '</h6><h6 class="text-muted ml-2"><del>$' . $row['delprice'] . '</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>';
                    $i++;
                    if($i === 8) break;
            }
            ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="subcribe bg-gray-900">
        <div class="container my-5">
            <div class="row justify-content-md-center py-5 ">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class=" text-light px-5 mb-3">REGISTER</h2>
                        <p class="text-light">Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" placeholder="Email...">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4 text-light">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
    <!-- Products Start -->
    <div class="container pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Featured products</span></h2>
        </div>
        <div class="row  pb-3">
        <?php
                
                // truy vấn danh sách các sản phẩm
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);
                $i="1";
            // hiển thị danh sách sản phẩm từ cơ sở dữ liệu
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4" data-index="'.$i.'">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="product-thumbnail img-fluid w-100" src="backend/' . $row['urlimage'] . '" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="product-name text-truncate mb-3">' . $row['productname'] . '</h6>
                                <div class="d-flex justify-content-center">
                                    <h6 class="product-price">$' . $row['price'] . '</h6><h6 class="text-muted ml-2"><del>$' . $row['delprice'] . '</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>';
                    $i++;
                    if($i === 8) break;
            }
            ?>
            

            

            

           

            

            
            

            
        </div>
    </div>
    <!-- Products End -->

    <!-- banner start -->
    <div class="banner mt-0 pt-5 pb-5">
        <div class="banner-desktop">
            <img src="frontend//img/5-ly-do-mua-tai-fridayshopping-pc.webp" alt="" width="100%" height="100%">
        </div>
        <div class="banner-mobi">
            <img src="frontend//img/5-ly-do-mua-tai-fridayshopping-mb.webp" alt="" width="100%" height="100%">
        </div>
    </div>
    <!-- banner end -->

    <!-- Vendor Start -->
    <div class="container py-5">
        <div class="row ">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-adriatica-350x350.webp" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-Frederique-Constant-350x350.png" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-ogival-350x350.png" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-op-350x350.webp" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-orient-350x350.png" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-seiko-350x350.png" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-skagen-350x350.png" alt="">
                    </div>
                    <div class="vendor-item  p-4">
                        <img src="frontend/img/thuong-hieu-casio-350x350.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <div class="noidungphu">
        <div class="video">
            <img class="anh" src="frontend//img/hinh-nen-dong-ho-dep-full-hd-1-0.jpg" alt="" width="100%" height="100%">
            <div class="play"><i class="fa-solid fa-play"></i></div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2489.8999328224413!2d108.24114807887034!3d16.044216276332122!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314217619f468faf%3A0x60d4a27c80a858e9!2zOTUgTmfFqSBIw6BuaCBTxqFuLCBC4bqvYyBN4bu5IEFuLCBOZ8WpIEjDoG5oIFPGoW4sIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1687265215984!5m2!1svi!2s" width="100%" height="97%" style="border:0; margin: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="footer bg-gray-900">
        <div class="container text-light mt-5 pt-5">
            <div class="row  pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="" class="text-decoration-none">
                        <h2 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">FrifayShopping</span></h2>
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
                                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                                </div>
                                <div class="button">
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

    <div class="toast-message">
        <p class="text-light p-3">Sản phẩm đã được thêm vào giỏ hàng</p>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div>
                <div style="display: flex;">
                    <div style="flex-wrap: nowrap;">
                        <img id="0" src="frontend//img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="" width="600px" height="400" style="border-radius: 20px;">
                        <hr>
                        <div class="modal_img">
                            <img id="1" onclick="showimg(1)" src="frontend//img/MTD-100D-7A2VDF-350x350.webp" alt="" width="100px">
                            <img id="2" onclick="showimg(2)" src="frontend//img/MTP-1375D-1AVDF-350x350.webp" alt="" width="100px">
                            <img id="3" onclick="showimg(3)" src="frontend//img/MTP-1375L-1AVDF-350x350.webp" alt="" width="100px">
                            <img id="4" onclick="showimg(4)" src="frontend//img/dong-ho-casio-GA-2100SU-1ADR-350x350.webp" alt="" width="100px">
                        </div>
                    </div>
                    <div class="product-img">
                        <h1>Đồng hồ Casio MTP-1375D-7A2VDF</h1>
                        <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" class="form_background  margin-bottom-0">
                            <div class="group-status">
                                <span class="first_status status_2">
                                    Status:
                                    <span class="status_name availabel">
                                        Stocking
                                    </span>
                                    <span class="line">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </span>
                            </div>
                            <div class="price-box">
                                <span class="special-price">
                                    <span class="price product-price">$123.00</span>
                                </span> <!-- Giá Khuyến mại -->
                            </div>
                            <div class="form-product pt-3">
                                <div class="box-variant clearfix ">
                                    <input type="hidden" name="variantId" value="49413019">
                                </div>
                                <div class="form_button_details margin-top-15 w-100">
                                    <div class="form_product_content type1 ">
                                        <div class="soluong soluong_type_1 show">
                                            <label>Quantity:</label>
                                            <div class="custom input_number_product custom-btn-number ">
                                                <input type="number" id="qtym111" name="quantity" value="1" maxlength="3" class="form-control prd_quantity pd-qtym">
                                            </div>
                                        </div>
                                        <div class="button_actions clearfix" style="grid-template-columns:1fr 1fr ">
                                            <div class="card-footer d-flex justify-content-between bg-light border">
                                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <div id="modal2" class="modal2">
        <div class="modal2-content">
            <span class="close2">&times;</span>
            <div class="video2">
                <iframe width="1122" height="631" src="https://www.youtube.com/embed/npVdkgJlXQY" title="CharmeWatch - Quay Clip  Quảng Cáo Sản Phẩm Đồng Hồ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/lib/easing/easing.min.js"></script>
    <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="frontend/js/main.js"></script>


</body>

</html>