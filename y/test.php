<?php include '../config.php' ?>


<?php





?>


<html>
    <body>
        
    <img src="<?php 
    $img="SELECT  `image` FROM `product` WHERE pid=1";
    $result=mysqli_query($conn,$img);
    $kiwi=$result['image'];

    echo"$kiwi";
    ?>" alt="">
    </body>
</html>
