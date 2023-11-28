<?php
    include 'config.php';
    session_start();

    if (isset($_GET["creart-bill"])) {
        $tong = $_GET['tong'];
        // $i=1;
        echo $tong;
        do{
            $madonhang = mt_rand(1000,9999);
            
            $query = "SELECT * FROM bill WHERE mabill";
            $result = mysqli_query($conn, $query);    
        } while(mysqli_num_rows($result) > 0);
        

        for($i = 1; $i <= $tong; $i++){
            $name=$_GET["name$i"];
            $quantity=$_GET["quantity$i"];
            $total=$_GET["total$i"];

            
            $insert_ttbill = "INSERT INTO bill_ct (mabill,name,quantity,total) VALUES ('$madonhang', '$name','$quantity', '$total')";
            if ($conn->query($insert_ttbill) == TRUE) {
               echo "thanh cong";
            } else {
                echo "thất bại";
            }
        }

        
    }
?>