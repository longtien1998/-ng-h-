<?php 
    session_start();
    if (isset($_SESSION["email"])) {
        echo "Wellcom User NAme : " . $_SESSION["email"] . "<br>";
    }
    if (isset($_SESSION["pass"])) {
        echo "PASSWORD: " . $_SESSION["pass"] . "<br>";
    }
    // $capcha = mt_rand(10000,99999);
    $thongbao= "";
    $mail="";   
    // echo $capcha;
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $mail = $_POST["email"];
        // $number = $_POST["number"];
        if($mail == $_SESSION["email"]){
            header("Location: newpass.php");
        } else {
            
            $thongbao = 'Email không có trong hệ thống';
        }
       
    }
    
   
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGOT PASSWORD</title>
    <link rel="stylesheet" href="./css/forgotpass.css">
</head>
<body>
    
    <div>
        <h1>Quên Mật khẩu</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method="POST">
            <span> <?php echo $thongbao; ?></span>
            <label class="label" for="email">Vui lòng nhập email</label>
            <input type="text" class="name" id="name" name="name" required="">
            <!-- <label class="label" for="capcha"> xác nhận capcha: <?php echo $capcha; ?> </label>
            <input type="text" class="number" id="number" required=""> -->
            
            <input type="submit" class="submit" value="Xác nhận">
            
            <!-- <span><?php echo $mail; ?></span> -->
        </form>
    </div>
</body>
</html> 