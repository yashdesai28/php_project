<?php include 'config.php' ?>
<?php

session_start();


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
$username = $_SESSION['username'];


if (isset($_POST['placeorder'])) {

    $pname = "";
    $totalp = "";
    $opque = "";
    $oprice = "";

    $cout = 0;

    foreach ($_POST['opname'] as $val) {

        $cout++;
    }

    $mcout = $cout;
    echo "$cout,====,$mcout";

    for ($i = 0; $i < $cout; $i++) {

        $pname = $pname . "," . $_POST['opname'][$i];
        $totalp = $totalp . " " . $_POST['opprice'][$i];
        $opque = $opque . " " . $_POST['oque'][$i];
        $oprice = $oprice . " " . $_POST['oprice'][$i];
    }

    echo "$totalp";





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

            $gtotals = $_POST['ototal'];

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



            $pyment = 1;

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../home-img/Apple-Logo-Modern-Icon.png">
    <link rel="stylesheet" href="placeorder.css">


    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="reusable.css">
    <title>Place Order</title>

    <style>
        h2 {
            font-size: 4.2rem;
            margin-bottom: 1.8rem;
            color: #333;
        }

        h3 {
            font-size: 20px;
        }

        .icon1 {
            width: 100%;
            height: 7rem;
            color: white;

        }


        .popup1 {
            width: 360px;
            background-color: white;
            border-radius: 13px;
            border: none;

            position: absolute;
            top: 0%;
            left: 50%;
            transform: translate(-50%, -50%)scale(0.1);
            display: flex;
            flex-direction: column;

            box-shadow: 2px 2px 40px rgb(0 0 0 / 19%);
            align-items: center;
            height: 27rem;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;


        }


        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%)scale(1);




        }



        .errorimg {

            background-color: #e03131;
            border-top-left-radius: 13px;
            border-top-right-radius: 13px;
            width: 100%;
            height: 8.5rem;
            display: flex;
            justify-content: center;
            align-items: center;


        }

        .decerror {
            margin-bottom: 3rem;

        }

        .otpsub {
            margin-top: 1.5rem;
        }

        .maindec {
            margin-top: 1rem;
        }

        #otpsub {
            width: 10rem;
            height: 2.7rem;
            background-color: #e03131;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .open-blur {
            filter: blur(10px);
        }
    </style>
</head>

<body>

    <section class="nav sticky" id="blur">
        <nav class="navigation">
            <div class="logo-img">
                <a class="logo-link" href="#"><img src="home-img/Apple-Logo-Modern-Icon.png" alt="logo"></a>
            </div>

            <div class="ul-list">
                <ul class="nav-list">
                    <li class="list-option"><a class="link" href="product.php">product category</a> </li>
                    <li class="list-option"><a class="link" href="test3.php">best seller</a></li>
                    <li class="list-option"><a class="link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg></a></li>

                    <li class="list-option"> <a class="link" href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="icon">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                            </svg>
                        </a></li>

                    <li class="list-option"> <a class="link" href="ywhishlist.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg></a></li>
                    <li class="list-option"><a class="link" href="carttable.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg></a></li>

                </ul>
            </div>
        </nav>
    </section>

    <br>

    <br>

    <br>


    <section class="placeorder" id="blur">
        <div class="order-container">
            <div class="left-form">
                <h2 class="secondory-head">Billing Details</h2>
                <form class="form-ineer" method="POST">

                    <div class="grid-row-3">
                        <div class="flex">
                            <label class="in-lable">Country</label>
                            <select class="input" name="country" disabled>
                                <option value="India" selected>India</option>
                            </select>
                        </div>
                        <div class="flex">
                            <label class="in-lable">State</label>
                            <select class="input" name="state1" disabled>
                                <option value="Gujrat" selected>Gujrat</option>
                            </select>
                        </div>

                        <div class="flex">
                            <label class="in-lable">City</label>
                            <select class="input" disabled>
                                <option value="Surat" selected>Surat</option>
                                <input type="hidden" value="surat" name="city1">
                            </select>
                        </div>
                    </div>


                    <div class="grid-row">
                        <div class="flex">
                            <label class="in-lable">firstname</label>
                            <input type="text" id="namef" name="fname" value="<?php echo "$rowu[1]"; ?>" class="input">
                        </div>
                        <div class="flex">
                            <label class="in-lable">lastname</label>
                            <input type="text" name="lname" value="<?php echo "$rowu[2]"; ?>" class="input">
                        </div>
                    </div>

                    <div class="flex">
                        <label class="in-lable">Address</label>


                        <input type="text" name="yaddres" class="input" placeholder="Street Address">

                        <input type="text" name="y2addres" class="input" placeholder="Apartment,area(optional)">

                    </div>



                    <div class="grid-row">
                        <div class="flex">
                            <label class="in-lable">Area</label>
                            <select class="input" name="area">
                                <option value="Katargam" <?php if ($rowu[8] == 'Katargam') {
                                                                echo "selected";
                                                            } ?>>Katargam</option>
                                <option value="Varachha Road" <?php if ($rowu[8] == 'Varachha Road') {
                                                                    echo "selected";
                                                                } ?>>Varachha</option>
                            </select>
                        </div>

                        <div class="flex">
                            <label class="in-lable">Postcode</label>
                            <select class="input" name="pincode">
                                <option value="395004" <?php if ($rowu[6] == 395004) {
                                                            echo "selected";
                                                        } ?>>395004</option>
                                <option value="395006" <?php if ($rowu[6] == 395006) {
                                                            echo "selected";
                                                        } ?>>395006</option>
                            </select>
                        </div>
                    </div>





                    <div class="grid-row">
                        <div class="flex">
                            <label class="in-lable">Email</label>
                            <input type="email" name="email" value="<?php echo "$rowu[3]"; ?>" class="input" disabled>
                        </div>
                        <div class="flex">
                            <label class="in-lable">Phone</label>
                            <input type="number" name="phone" value="<?php echo "$rowu[4]"; ?>" class="input" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="flex">
                        <label class="in-lable ">Order Notes</label>
                        <textarea rows="4" class="input"></textarea>

                    </div>


            </div>

            <div class="right-form">
                <!-- <h2>coupon code</h2>
                   
                        <div class="flex">
                            <label class="in-lable ">Enter your coupon code id you have</label>
                            <div>
                            <input type="text" name="email"   class="input">
                            <button type="submit " class="input coupon-btn">Apply</button>
                            </div>
                        </div> -->






                <h2>Your Order</h2>

                <div class="totaltb">
                    <table class="main-tb">
                        <th>Product</th>
                        <th>total</th>





                        <?php
                        while ($row = mysqli_fetch_array($result)) {


                            echo '<tr>';
                            echo '<td class="product1" style="color: green;">' . $row[3] . '</td>';
                            echo '<td class="product1" style="color: green;">' . $row[6] . ' &#8377 </td>';

                            echo ' <input type="hidden" name="opname[]" value="' . $row[3] . '" >';
                            echo '<input class=opprice type="hidden" name="opprice[]" value="' . $row[6] . '">';

                            echo '<input  type="hidden" name="oprice[]" value="' . $row[4] . '">';

                            echo '<input  type="hidden" name="oque[]" value="' . $row[5] . '">

                            </tr>';
                        } ?>

                        <tr>



                            <td class="product">Cart Total</td>
                            <td class="product" id="ctotal">200 &#8377</td>
                            <input id="ctotal1" type="hidden" name="ctotal" value="">
                        </tr>

                        <tr>
                            <td class="product">Order Total</td>
                            <td class="product" id="ototal"> 200 &#8377</td>
                            <input id="ototal1" type="hidden" name="ototal" value="">
                        </tr>

                    </table>


                    <div class="flex m-b">

                        <button class="input">Cash On Delivery</button>
                        <button class="input">Paytm</button>

                    </div>

                    <div class="flex mb-remove">
                        <button class="input place-order" type="submit" name="placeorder">Place Order</button>

                    </div>

                    </form>



                </div>



            </div>

        </div>
    </section>


    <div class="popup1" id="popup1">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="maindec">
            <h2>warning!</h2>
        </div>

        <div class="decerror">
            <h3>please complete all fields require</h3>
        </div>


        <button type="submit" id="otpsub" onclick="closepopup()">close</a></button>
    </div>


    <div class="popup1" id="popup2">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="maindec">
            <h2>warning!</h2>
        </div>

        <div class="decerror">
            <h3>please valid information</h3>
        </div>


        <button type="submit" id="otpsub" onclick="closepopup2()">close</a></button>
    </div>

    <script>
        var y = "<?php echo "$validinfo" ?>";

        let popup1 = document.getElementById("popup2");

        let blurr = document.getElementById("blur");



        if (y == 1) {

            popup1.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup2() {
            popup1.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>




    <script>
        var x = "<?php echo "$emptyerro" ?>";


        let popup = document.getElementById("popup1");

        let blurr = document.getElementById("blur");



        if (x == 1) {

            popup.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup() {
            popup.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>


    <script>
        gt = 0;

        var opprice = document.getElementsByClassName('opprice');
        var ctotal = document.getElementById('ctotal');
        var ottal = document.getElementById('ototal');
        var ctotal1 = document.getElementById('ctotal1');
        var ottal1 = document.getElementById('ototal1');


        for (i = 0; i < opprice.length; i++) {


            gt = gt + parseInt(opprice[i].value);
            console.log(gt);


        }

        ctotal.innerHTML = gt;
        ototal.innerHTML = gt;

        ctotal1.value = gt;
        ototal1.value = gt;
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>








    <script>
        var yt = "<?php echo "$pyment" ?>";

        if (yt == 1) {
           
                var name = jQuery('#namef').val();
                var amt =  "<?php echo "$gtotals" ?>";

                jQuery.ajax({
                    type: 'post',
                    url: 'payment_process.php',
                    data: "amt=" + amt + "&name=" + name,
                    success: function(result) {
                        var options = {
                            "key": "rzp_test_HiTtcSLsG1tdWt",
                            "amount": amt * 100,
                            "currency": "INR",
                            "name": "omnifood",
                            "description": "Test Transaction",
                            "image": "",
                            "handler": function(response) {
                                jQuery.ajax({
                                    type: 'post',
                                    url: 'payment_process.php',
                                    data: "payment_id=" + response.razorpay_payment_id,
                                    success: function(result) {

                                        window.location.href = "admin.php";
                                    }
                                });
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    }
                });


            
        }
    </script>



</body>

</html>