<?php
    
    include 'config.php';
    $messega="";
    if (isset($_GET["search-on"])) {
        $search= $_GET["search"];

        // echo $search;
        $query = "SELECT * FROM product WHERE productname LIKE  '%$search%' ";
        $result = mysqli_query($conn, $query);
       
        if(mysqli_num_rows($result) > 0){
            $messega="Kết quả tìm kiếm cho: ".$search;
        } else {
            $messega="Không tìm thấy kết quả tìm kiếm nào ";
        }
    }

?>
<?php
    // khởi tạo biên session

    session_start();
    // kiểm tra xem sessionuser có tồn tại không ?
    $user = '';
    if (isset($_SESSION["user"])) {
        $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Welcome ' . $_SESSION["user"] . '<br> <a href="logout.php"  tite="Logout">Logout.</a> </div>';
    } else $user = '<a href="Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Login</a>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Đồng hồ đeo tay chính hãng 100%, giá rẻ giảm 50%, góp 0%< </title>
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
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
            <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


            <!-- Customized Bootstrap Stylesheet -->
            <link href="css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="css/main.css">
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
                        <form action="" class="w-100 position-relative">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary text-light">
                                        <i class="fa fa-search"></i>
                                    </span>
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
                                    <a href="shop.php" class="nav-item nav-link position-relative text-uppercase  mx-4 active">Shop</a>
                                    <a href="detail.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Shop Detail</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2"><?php echo $messega; ?></span></h2>
        </div>
        <div class="row px-xl-5">
            
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="search.php" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name" value="<?php echo $search; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    // truy vấn danh sách các sản phẩm
                    // hiển thị danh sách sản phẩm từ cơ sở dữ liệu
                    $query = "SELECT * FROM product WHERE productname LIKE  '%$search%' ";
                    $result = mysqli_query($conn, $query);
                    $i="1";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                    <div class="card product-item border-0 mb-4" data-index="'.$i.'">
                                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <img class="product-thumbnail img-fluid w-100" src="../backend/' . $row['urlimage'] . '" alt="">
                                            <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                            <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                            <h6 class="product-name text-truncate mb-3">' . $row['productname'] . '</h6>
                                            <div class="d-flex justify-content-center">
                                                <h6 class="product-price">$' . $row['price'] . '</h6>
                                                <h6 class="text-muted ml-2"><del>$' . $row['delprice'] . '</del></h6>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border">
                                            <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>';
                    $i++;
                    }
                    
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/80_MTP-1375D-7A2VDF-2-350x350.jpg" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/MTP-1375D-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/80_MTP-1375D-7A2VDF-2-350x350.jpg" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/MTP-1375D-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/AE-1200WHD-1AVDF-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="">
                                <div href="#" class="btn btn-sm text-dark eye p-0"><i class="fas fa-eye text-primary show mr-1"></i></div>
                                <a href="#" class="btn btn-sm text-dark heart p-0"><i class="fa-regular fa-heart text-primary"></i></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Đồng hồ Casio MTP-1375D-7A2VDF</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a type="button" class="btn btn-sm btn-add-cart text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add to cart</a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>  -->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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
                                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
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
                <div style="display: flex;">
                    <div style="flex-wrap: nowrap;">
                        <img id="0" src="./img/dong-ho-casio-GA-2100-1ADR-350x350.webp" alt="" width="600px" height="400" style="border-radius: 20px;">
                        <hr>
                        <div class="modal_img">
                            <img id="1" onclick="showimg(1)" src="./img/MTD-100D-7A2VDF-350x350.webp" alt="" width="100px">
                            <img id="2" onclick="showimg(2)" src="./img/MTP-1375D-1AVDF-350x350.webp" alt="" width="100px">
                            <img id="3" onclick="showimg(3)" src="./img/MTP-1375L-1AVDF-350x350.webp" alt="" width="100px">
                            <img id="4" onclick="showimg(4)" src="./img/dong-ho-casio-GA-2100SU-1ADR-350x350.webp" alt="" width="100px">
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