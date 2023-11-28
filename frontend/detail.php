<?php
    include 'config.php';
    // truy vấn danh sách các sản phẩm
    $query = "SELECT * FROM product";
    $result = mysqli_query($conn, $query);
?>

<?php
    // khởi tạo biên session

    session_start();
    // kiểm tra xem sessionuser có tồn tại không ?
    $user='';
    if (isset($_SESSION["user"])) {
        $user ='<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome '. $_SESSION["user"].'<br> <a href="logout.php"  tite="Logout">Logout.</a> </div>';

    } else $user= '<a href="Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Login</a>';
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
                                    <a href="../index.php" class="nav-item nav-link position-relative text-uppercase mx-4 ">Home</a>
                                    <a href="shop.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop</a>
                                    <a href="detail.php" class="nav-item nav-link position-relative text-uppercase  mx-4 active">Shop Detail</a>
                                    <a href="cart.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shopping Cart</a>
                                    <a href="checkout.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Checkout</a>
                                    <a href="contact.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Contact</a>
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


    <!-- Page Header Start -->
    <div class="container-fluid bg-gray-200 mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5 product-item">
            <div class="col-lg-5 pb-5">
                <div id="product-slick-slide" class="slick slide">
                    <div class="product-slick-inner border position-relative">
                        <div class="product-slick-item">
                            <img class="product-thumbnail w-100 h-100" src="./img/80_MTP-1375D-7A2VDF-2-350x350.jpg" alt="Image">
                        </div>
                        <div class="product-slick-item">
                            <img class="w-100 h-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="Image">
                        </div>
                        <div class="product-slick-item">
                            <img class="w-100 h-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="Image">
                        </div>
                        <div class="product-slick-item">
                            <img class="w-100 h-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="Image">
                        </div>
                    </div>

                    <div class="product-navfor-slick-inner border">
                        <div class="row w-100" id="slick-slide-navfor">
                            <div class="col-lg-3 mw-100">
                                <div class="product-slick-item">
                                    <img class="w-100 h-100" src="./img/80_MTP-1375D-7A2VDF-2-350x350.jpg" alt="Image">
                                </div>
                            </div>

                            <div class="col-lg-3 mw-100">
                                <div class="product-slick-item">
                                    <img class="w-100 h-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="Image">
                                </div>
                            </div>

                            <div class="col-lg-3 mw-100">
                                <div class="product-slick-item">
                                    <img class="w-100 h-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="Image">
                                </div>
                            </div>

                            <div class="col-lg-3 mw-100">
                                <div class="product-slick-item">
                                    <img class="w-100 h-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="product-name font-weight-semi-bold">Đồng hồ Casio MTP-1375D-7A2VDF</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">$150.00</h3>
                <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
                
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/external-anggara-basic-outline-anggara-putra/32/000000/external-shield-ecommerce-interface-anggara-basic-outline-anggara-putra.png"/>

                        <p class="ml-2">Bảo hành chính hãng 2 năm tại các trung tâm bảo hành hãng</p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/wired/32/000000/renew-subscription.png"/>

                        <p class="ml-2">Bảo hành có cam kết trong 12 tháng </p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/ios/32/000000/open-box.png"/>
                        <p class="ml-2">Bộ sản phẩm gồm: Hướng dẫn sử dụng, Hộp, Phiếu bảo hành</p>
                    </div>

                    <div class="col-lg-6 d-flex align-items-start">
                        <img src="https://img.icons8.com/dotty/32/000000/truck--v1.png"/>

                        <p class="ml-2">
                            TP.Hồ Chí Minh (trừ Củ Chi, Nhà Bè, Cần Giờ): giao hàng nhanh chóng.<br/>
                            Tỉnh thành khác: giao hàng từ 2 - 10 ngày. Xem chi tiết
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-gray-200 text-center" value="1">
                        <input type="hidden" name="quantity" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-add-cart text-light px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Infomation</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Review (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                        <td class="font-weight-bold">Giới tính:</td>
                                        <td>Nữ</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Đường kính mặt:</td>
                                        <td>
                                            36 mm</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Dây đeo:</td>
                                        <td>
                                            Da cá sấu</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Độ rộng dây:</td>
                                        <td>18 mm</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Khung viền:</td>
                                        <td>
                                            Thép không gỉ 316L mạ PVD</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Độ dày mặt:</td>
                                        <td>
                                            10.6 mm</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                        <td class="font-weight-bold">Giới tính:</td>
                                        <td>Nữ</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Đường kính mặt:</td>
                                        <td>
                                            36 mm</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Dây đeo:</td>
                                        <td>
                                            Da cá sấu</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Độ rộng dây:</td>
                                        <td>18 mm</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Khung viền:</td>
                                        <td>
                                            Thép không gỉ 316L mạ PVD</td>
                                      </tr>
                                      <tr>
                                        <td class="font-weight-bold">Độ dày mặt:</td>
                                        <td>
                                            10.6 mm</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                        <i class="far fa-star rate-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h3 class="section-title px-5"><span class="px-2">Related products</span></h3>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="">
                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./img/80_MTP-1375D-7A2VDF-2-350x350.jpg" alt="">
                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="">
                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="">
                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="">
                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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
    <div id="modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <div>
            <div style="display: flex;" >
                <div style="flex-wrap: nowrap;">
                    <img id="0" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="" width="600px" height="400"  style="border-radius: 20px;"><hr>
                    <div class="modal_img">
                        <img id="1"  onclick="showimg(1)"  src="./img/MTD-100D-7A2VDF-350x350.webp" alt="" width="100px" >
                        <img id="2" onclick="showimg(2)" src="./img/MTP-1375D-1AVDF-350x350.webp" alt="" width="100px" >
                        <img id="3"  onclick="showimg(3)" src="./img/MTP-1375L-1AVDF-350x350.webp" alt="" width="100px" >
                        <img id="4" onclick="showimg(4)" src="./img/dong-ho-casio-GA-2100SU-1ADR-350x350.webp" alt="" width="100px" >
                    </div>
                </div>
                <div class="product-img">
                    <h1>Đồng hồ Casio MTP-1375D-7A2VDF</h1>
                    <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" class="form_background  margin-bottom-0"  >			
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
                                            <input type="number" id="qtym111" name="quantity" value="1" maxlength="3" class="form-control prd_quantity pd-qtym" >
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
</body>

</html>