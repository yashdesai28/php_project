<?php include 'config.php' ?>
<?php

session_start();


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
$username = $_SESSION['username'];


if (isset($_POST['placeorder'])) {

    $pname ="";
    $totalp ="";
    $opque = "";
    $oprice ="";

    $cout = 0;

    foreach ($_POST['opname'] as $val) {

        $cout++;
    }

    $mcout = $cout;
    echo "$cout,====,$mcout";

    for ($i = 0; $i < $cout; $i++) {

        $pname = $pname.",".$_POST['opname'][$i];
        $totalp =$totalp." ". $_POST['opprice'][$i];
        $opque = $opque." ". $_POST['oque'][$i];
        $oprice = $oprice." ". $_POST['oprice'][$i];

       

    }
    
    echo"$totalp";


  


    $fn = $_POST['fname'];
    echo "===$fn";

    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && !empty($_POST['area']) && !empty($_POST['pincode']) && !empty($_POST['yaddres']) && !empty($_POST['y2addres'])) {



        if (!preg_match("/^[a-zA-z]*$/", $_POST["fname"])) {


            $flag = 0;
        } else {


            if (!preg_match("/^[a-zA-z]*$/", $_POST["lname"])) {

                $flag = 0;
            } else {

                if (!preg_match("/^[0-9]*$/", $_POST["phone"])) {

                    $flag = 0;
                } else {

                    $mobileno = strlen($_POST["phone"]);



                    if ($mobileno >= 10 && $mobileno < 11) {

                        $flag = 1;
                    } else {

                        $flag = 0;
                    }
                }
            }
        }

        echo "$flag";





        if ($flag == 1) {

            echo "yash";
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $pincode = $_POST['pincode'];
            $address = $_POST['yaddres'];
            $address = $address . $_POST['y2addres'];
            // $state = $_POST['state1'];
            $city = $_POST['city1'];
            $area = $_POST['area'];



            echo "$address";

            $gtotals=$_POST['ototal'];
         
                $inorder = "INSERT INTO `order`(  `oemail`, `fname`, `lname`, `pho`, `city`, `Area`, `Address`, `Product`, `oprice1`, `que`, `total`, `pincode`, `grandtotal`) VALUES ('$username',' $fname','$lname','$phone','$city','$area','$address','$pname','$oprice','$opque','$totalp','$pincode','$gtotals')";
                mysqli_query($conn, $inorder);
          


            for ($i = 0; $i < $mcout; $i++) {

                $pname = $_POST['opname'][$i];
                $totalp = $_POST['opprice'][$i];
                $opque = $_POST['oque'][$i];
                $oprice = $_POST['oprice'][$i];

                $showsotck = "SELECT * FROM `stock` WHERE pname='$pname' ";
                $results = mysqli_query($conn, $showsotck);
                $rows = mysqli_fetch_array($results);


                $upostock = $rows[2] - $opque;
                $upep = $rows[8] - $totalp;

                $upstock = "UPDATE `stock` SET `purchasestock`='$upostock',`expectedsalesstockprice`='$upep' WHERE pname='$pname' ";
                mysqli_query($conn, $upstock);



                $showproduct = "SELECT * FROM `tblproduct` WHERE pname='$pname' ";
                $resultspro = mysqli_query($conn, $showproduct);
                $rowpro = mysqli_fetch_array($resultspro);


                $updproduct = $rowpro[6] - $opque;

                if ($updproduct == 0) {

                    $deletepro = "DELETE FROM `tblproduct` WHERE  pname='$pname'";
                    mysqli_query($conn, $deletepro);

                    $deltestock = "DELETE FROM `stock` WHERE pname='$pname'";
                    mysqli_query($conn, $deltestock);
                } else {

                    $upproduct = "UPDATE `tblproduct` SET `totalstock`='$updproduct' WHERE pname='$pname' ";
                    mysqli_query($conn, $upproduct);
                }





                $deletewi = "DELETE FROM `cart` WHERE username='$username'";
                mysqli_query($conn, $deletewi);
            }

            header("location:admin.php");



            $succse = 1;
        } else {

            $validinfo = 1;
        }
    } else {


        $emptyerro = 1;
    }
}



$showuser = "SELECT * FROM `reg` WHERE email='" . $_SESSION['username'] . "' ";
$qur = mysqli_query($conn, $showuser);
$rowu = mysqli_fetch_array($qur);




$username = $_SESSION['username'];

$cart = "SELECT * FROM `cart` WHERE username='$username'";
$result = mysqli_query($conn, $cart);




?>