<?php 
    include 'config.php';
    // kiểm tra xem form đã submit chưa
    $message='';
    $message1='';
    $message2='';
    $message3='';
    $message4='';
    $message5='';
    $message6='';
    $message7='';
    $message8='';
    $filenull="";
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        // lấy tên sap từ form
        $price = $_POST['price'];
        $delprice = $_POST['delprice'];
        $name = $_POST['name'];
        $target_dir = "uploads/";
        
        // check có tải ảnh k
        if($_FILES["filetoUpload"]["name"] == $filenull){
            $query = "UPDATE product SET productname = '$name', price = '$price', delprice = '$delprice' WHERE id = '$id' ";
            $result = mysqli_query($conn,$query);
            // kiểm tra kết quả try vấn
            if($result){
                
                $message5 = '<h2 class="section-title px-5"><span class="px-2" style="color: green;">Cập nhập sản phẩm thành công</span></h2>';
            } else{
                $message6 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Có lỗi xảy ra</span></h2><br>'.mysqli_error($connection);
            }
        } else {
            // đường dẫn đến thư mục file
            $target_file = $target_dir.basename($_FILES["filetoUpload"]["name"]);
            //gán trạng thái upload file = 1 ( thành công)
            $uploadok = 1;
            // lấy định dạn ảnh
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // kiểm tra xem file đã đúng tồn tại chưa
            if(file_exists($target_file)){
                $message1 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">File đã tồn tại</span></h2><br>';
                // bật trạng thái upload khi cài file lỗi
                $uploadok= 0;

            }
            // kiểm tra kích thước file
            if($_FILES["filetoUpload"]["size"] > 500000){
                $message2 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">File ảnh quá lớn</span></h2><br>';
                $uploadok = 0;

            }
            // kiểm tra định dạng file 
            if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
                $message3 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Chỉ chấp nhận file JPG, JPEG, PNG, GIF</span></h2><br>';
                $uploadok = 0;
            }
            // kiểm tra nếu $uploadok = 0, tức là có lỗi xãy ra
            if($uploadok == 0){
                $message4 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Tập tin không được tải lên</span></h2><br>';
            } else {
                // di chuyển file từ thư mục tạm lên thư mụ đích
                if(move_uploaded_file($_FILES["filetoUpload"]["tmp_name"], $target_file)){
                    // lấy địa chỉ ảnh sau khi đã upload thành công
                    $path = $target_dir.basename($_FILES["filetoUpload"]["name"]);
                    //chèn vào bảng product trong cơ sowe dữ liệu test
                    $query = "UPDATE product SET productname = '$name', price = '$price', delprice = '$delprice' , urlimage='$path' WHERE id = '$id' ";
                    $result = mysqli_query($conn,$query);
                    // kiểm tra kết quả try vấn
                    if($result){
                        
                        $message5 = '<h2 class="section-title px-5"><span class="px-2" style="color: green;">Cập nhập sản phẩm thành công</span></h2>';
                    } else{
                        $message6 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Có lỗi xảy ra</span></h2><br>'.mysqli_error($connection);
                    }
                } else {
                    $message7 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">có lỗi xãy ra khi tải lên file</span></h2>';
                }
            }
        }
        
         
    } else if(isset($_GET['id'])){ // trong trường hợp lấy id khi click vào  link ở trang danh sách 
        // lấy giá trị ID từ pârameter
        $id = $_GET['id'];
        // echo $id;
        // truy vấn sản phẩm dựa vtreen  IDxxx
        $query = "SELECT * FROM product WHERE id = '$id' ";
        $result = mysqli_query($conn,$query);
        // kiểm tra kết quả truy vấn 
        if($result){
            $row = mysqli_fetch_assoc($result);
           $name = $row['productname']; // lấy dữ liệu theo cột
           $target_dir = $row['urlimage'];
           $price = $row['price'];
           $delprice = $row['delprice'];
        } else {
            $message6 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Có lỗi xảy ra</span></h2><br>'. mysqli_error($conn);
        }
         // đóng kết nối
         mysqli_close($conn);
    } else {
        $message6 = '<h2 class="section-title px-5"><span class="px-2" style="color: red;">Không tìm thấy sản phẩm  để cập nhập</span></h2><br>';
    }
    $message= $message1.$message2.$message3.$message4.$message5.$message6.$message7;
?>


<?php
// khởi tạo biên session

session_start();
// kiểm tra xem sessionuser có tồn tại không ?
$user = '';
if (isset($_SESSION["user"])) {
    $user = '<div class="nav-item nav-link position-relative text-uppercase  mx-4" > Admin ' . $_SESSION["user"] . '<br> <a href="/frontend/logout.php"  tite="Logout">Logout.</a> </div>';
} else $user = '<a href="/frontend/Login.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Login</a>';
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
            <link href="/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
            <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


            <!-- Customized Bootstrap Stylesheet -->
            <link href="/frontend/css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="/frontend/css/main.css">
            <link rel="stylesheet" href="/frontend/css/login_re.css">
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
                <div class="row align-items-center py-3 justify-content-center">
                    <div class="col-lg-3 d-none d-lg-block justify-self-lg-end">
                        <a href="home.php" class="text-decoration-none">
                            <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span></h2>
                        </a>
                    </div>
                    <div class="col-lg-3 col-16 d-flex align-items-center justify-content-lg-end ">

                        <a href="" class="btn" style="font-size: 20px">
                            <i class="fas fa-heart text-primary"></i>
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
                            <a href="home.php" class="text-decoration-none d-block d-lg-none">
                                <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">FridayShopping</span>
                                </h2>
                            </a>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav mr-auto py-0 w-100 d-flex justify-content-center">
                                    <a href="home.php" class="nav-item nav-link position-relative text-uppercase mx-4 ">Home</a>
                                    <a href="add_shop.php" class="nav-item nav-link position-relative text-uppercase  mx-4 active"> Add Shop</a>
                                    <a href="showshopdetail.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Show Shop Detail</a>
                                    <a href="showuser.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Show User Clint</a>
                                    <a href="statistical.php" class="nav-item nav-link position-relative text-uppercase  mx-4">Statistical</a>
                                    <a href="" class="nav-item nav-link position-relative text-uppercase  mx-4">Contact</a>
                                    <!-- <a href="/backend/usuer/login.php"
                                        class="nav-item nav-link position-relative text-uppercase  mx-4">Login</a> -->
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Add Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Add shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- add Shop Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2" >Update Product</span></h2>
        </div>
        <div class="text-center mb-4" >
            <?php echo $message; ?>
            <!-- <h2 class="section-title px-5"><span class="px-2">Register</span></h2> -->
        </div>
        <div class="main_container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-login" id="form-1" method="POST"  enctype="multipart/form-data">
                <div class="form-header">
                    <h3 class="form-heading">Update Product</h3>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <div class="form-group">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input id="name" name="name" type="text" placeholder="VD: Đồng hồ" class="form-control1" value="<?php echo $name ;?>">
                        <i class="fa-solid fa-clock form-user"></i>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Giá bán Mới</label>
                    <input id="price" name="price" type="number" placeholder="VD: 120" class="form-control1" value="<?php echo $price ;?>">
                    <i class="fa-solid fa-money-bill form-user"></i>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Giá bán cũ</label>
                    <input id="delprice" name="delprice" type="number" placeholder="VD: 140" class="form-control1" value="<?php echo $delprice ;?>">
                    <i class="fa-solid fa-money-bill form-user"></i>
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Chọn file hình ảnh</label>
                    <input id="filetoUpload" name="filetoUpload" type="file" class="form-control1" style="line-height: 17px;" >
                    
                    <i class="fa-solid fa-file form-user"></i>
                    <span class="form-message"></span>
                </div>
                <input class="form-submit" type="submit" name="submit" id="submit" value="Thêm sản Phẩm"></input>
            </form>
        </div>
    </div>
    <!-- add Shop End -->


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
   

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/lib/easing/easing.min.js"></script>
    <script src="/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/frontend/js/main.js"></script>
</body>

</html>