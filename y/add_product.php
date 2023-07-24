<?php include '../config.php' ?>


<?php


require_once('../conactionadmin.php');

if (isset($_POST['adminlogout'])) {

    header('location:../logout.php');
}


if (isset($_GET['pname'])) {

    $pnameu = $_GET['pname'];

    $getdata = "SELECT * FROM `stock` WHERE pname='$pnameu'";

    $resultupdat = mysqli_query($conn, $getdata);

    $row = mysqli_fetch_array($resultupdat);
}




if (!empty($_POST['pname']) && !empty($_POST['pkg'])  && !empty($_POST['pprice']) && !empty($_POST['pcategory'])) {

    $pname = $_POST['pname'];

    $chek = "SELECT * FROM `stock` WHERE pname='$pname'";
    $chekresult = mysqli_query($conn, $chek);
    $numrow = mysqli_num_rows($chekresult);

 
    if ($numrow != 0) {



        $imgname = $_FILES['uplodeimg']['name'];
        $tmpname = $_FILES['uplodeimg']['tmp_name'];
        $dec = "../images/" . $imgname;



        $img_img = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

        $allow_type = array('png', 'jpg', 'jpeg', 'webp');

        if (in_array($img_img, $allow_type)) {

            move_uploaded_file($tmpname, $dec);



            $pkg = $_POST['pkg'];

            $pprice = $_POST['pprice'];

            $pcategory = $_POST['pcategory'];
            $StockPurchasePrice = $_POST['StockPurchasePrice'];
            $Per1KGPrice = $_POST['Per1KGPrice'];
            $expectedsalesstockprice = $_POST['expectedsalesstockprice'];

            $active = 'Active';
            $upstock = "UPDATE `stock` SET `pname`='$pname',`purchasestock`='$pkg',`stockpurchaseprice`='$StockPurchasePrice',`per1kgprice`='$Per1KGPrice',`pcategory`=' $pcategory',`pImage`='$imgname',`saleprice1kg`='$pprice',`expectedsalesstockprice`='$expectedsalesstockprice' WHERE pname='$pname'";
            $upiresult = mysqli_query($conn, $upstock);

            $upproduct = "UPDATE `tblproduct` SET `pname`='$pname',`price`='$pprice',`image`='$imgname ',`pcategory`='$pcategory',`totalstock`=' $pkg ',`status`='$active' WHERE pname='$pname'";
            $uppresult = mysqli_query($conn, $upproduct);
            header('location:product.php');
        } else {
            echo '<script>alert("only image uplode")</script>';
        }
    } else {






        $imgname = $_FILES['uplodeimg']['name'];
        $tmpname = $_FILES['uplodeimg']['tmp_name'];
        $dec = "../images/" . $imgname;





        $pkg = $_POST['pkg'];

        $pprice = $_POST['pprice'];

        $pcategory = $_POST['pcategory'];
        $StockPurchasePrice = $_POST['StockPurchasePrice'];
        $Per1KGPrice = $_POST['Per1KGPrice'];
        $expectedsalesstockprice = $_POST['expectedsalesstockprice'];

        $img_img = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

        $allow_type = array('png', 'jpg', 'jpeg', 'webp');

        if (in_array($img_img, $allow_type)) {

            move_uploaded_file($tmpname, $dec);







            $active = 'Active';

            $psql = "INSERT INTO `tblproduct`(`pname`, `price`, `image`, `pcategory`,`totalstock`,`status`) VALUES ('$pname','$pprice','$imgname','$pcategory','$pkg','$active')";

            mysqli_query($conn, $psql);

            $squry = "INSERT INTO `stock`(`pname`, `purchasestock`, `stockpurchaseprice`, `per1kgprice`,`pcategory`, `pImage`, `saleprice1kg`, `expectedsalesstockprice`) VALUES ('$pname','$pkg','$StockPurchasePrice','$Per1KGPrice','$pcategory','$imgname','$pprice','$expectedsalesstockprice')";
            mysqli_query($conn, $squry);
            header('location:product.php');
        } else {
            echo "sorry ";
        }
    }
}
else
{
    echo '<script>alert("all fill filed")</script>';
}



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="mainlogo.png">
    <title>dashbord</title>

    <!--matiriyal icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!--css style-->
    <link rel="stylesheet" href="dashbord.css">
    <link rel="stylesheet" href="dashaddproduct.css">

    <style>
        select {
            width: 100%;
            min-width: 15ch;
            max-width: 30ch;
            border: 1px solid var(--select-border);
            border-radius: 0.25em;
            padding: 0.25em 0.5em;
            font-size: 1.25rem;
            cursor: pointer;
            line-height: 1.1;
            background-color: #fff;
            background-image: linear-gradient(to top, #f9f9f9, #fff 33%);
        }

        .abminlogout1 {
            background-color: white;
            cursor: pointer;
            color: #777;
            display: flex;
            flex-direction: row;
            gap: 1rem;

        }

        .abminlogout1:hover {
            color: #e03131;
        }



        #navbar__logo {
            background-color: #ff8177;
            background-image: linear-gradient(to top, #ffffff 0%, #99d1ff 100%);
            background-size: 100%;
           
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            display: flex;
            align-items: center;
            cursor: pointer;
            text-decoration: none;
            font-size: 2rem;
        }

        .navbar {
            background: #e03131;
            box-shadow: 0px 0px 30px rgb(0 0 0 / 19%);
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            position: sticky;
            top: 0;
            z-index: 999;
            color: white;
        }

        .profileicon {
            background-color: #e03131;
        }
    </style>

</head>

<body>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="mainlogo.png" alt="">
                    <h2>FoodMart</h2>
                </div>

                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>

                </div>
            </div>
            <div class="sidebar">

                <a href="index.php">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h3>dashboard</h3>
                </a>

                <a href="product.php">
                    <span class="material-symbols-sharp">inventory_2</span>
                    <h3>product</h3>
                </a>

                <a href="manage_user.php">
                    <span class="material-symbols-sharp">manage_accounts</span>
                    <h3>manage user</h3>
                </a>


                <a href="orders.php">
                    <span class="material-symbols-sharp">receipt_long</span>
                    <h3>orders</h3>
                </a>


                <a href="add_product.php" class="active">
                    <span class="material-symbols-sharp">add</span>
                    <h3>add product</h3>
                </a>


                <a href="stock.php">
                    <span class="material-symbols-sharp">inventory</span>
                    <h3>stock</h3>
                </a>


                <a href="profile.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>profile</h3>
                </a>



                <form action="" method="POST">

                    <a href="">
                        <button type="submit" class="abminlogout1" name="adminlogout"><span class="material-symbols-sharp">login</span>
                            <h3>Log out</h3>
                        </button>
                    </a>

                </form>


            </div>
        </aside>

    </div>

    <div class="container">

        <div class="khali">

        </div>

        <div class="bharelo">

            <!--nevbar section-->
            <nav class="navbar">
                <div class="navbar__container">
                    <a href="#home" id="navbar__logo">Add product</a>

                </div>
            </nav>

            <div class="prfilemain">
                <div class="left">

                    <div class="lefttop">
                        <div class="profileicon">

                            <span class="material-symbols-sharp">person</span>


                        </div>

                        <div class="editprofile">
                            <h2>ADD product</h2>
                        </div>

                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="inputleft">
                            <label for="">product Name</label>
                            <input class="f1" type="text" name="pname" value="<?php if (isset($row)) {
                                                                                    echo "$row[1]";
                                                                                } ?>">
                            <label for="">Total Purchase Stock (In KG)</label>
                            <input class="f1" type="number" name="pkg" id="oristockkg" value="<?php if (isset($row)) {
                                                                                                    echo "$row[2]";
                                                                                                } ?>" onkeyup="demo()">
                            <label for="">Total Stock Purchase Price(₹)</label>
                            <input class="f1" type="number" name="StockPurchasePrice" value="<?php if (isset($row)) {
                                                                                                    echo "$row[3]";
                                                                                                } ?>" id="oristokprice" onkeyup="demo()">
                            <label for="">Per 1KG Price</label>
                            <input class="f1" type="text" name="Per1KGPrice" value="<?php if (isset($row)) {
                                                                                            echo "$row[4]";
                                                                                        } ?>" id="oristockpricekg" onkeyup="demo()">
                            <label for="">Upload Image</label>
                            <input class="" type="file" name="uplodeimg">


                        </div>

                </div>
                <div class="right">

                    <div class="lefttop">



                    </div>

                    <div class="inputright">

                        <label for="">Sale Price (1 KG)</label>
                        <input class="f1" type="number" name="pprice" id="kg1price" value="<?php if (isset($row)) {
                                                                                                echo "$row[7]";
                                                                                            } ?>" onkeyup="demo()">
                        <label for=""> Expected Sales stock price</label>
                        <input class="f1" type="number" name="expectedsalesstockprice" value="<?php if (isset($row)) {
                                                                                                    echo "$row[8]";
                                                                                                } ?>" id="profitstocklprice" value="<?php echo "$yash"; ?> " onkeyup="demo()">
                        <label for="">Total profit stock KG</label>
                        <input class="f1" type="number" name="" id="profitstok" onkeyup="demo()">


                        <select name="pcategory">
                            <option value="fruits">fruits</option>
                            <option value="vegetables">vegetables</option>
                        </select>

                    </div>

                    <div class="editprofile">
                        <div class="lastbtn">
                            <button class="editbtn">Add product</button>
                        </div>
                    </div>

                    </form>

                    <label for="">profit In % </label>
                    <input class="f1" type="text" name="pprice" id="profittaka" onkeyup="demo()">
                    <label for="">Total profit price</label>
                    <input class="f1" type="text" name="pprice" id="profitprice" onkeyup="demo()">

                </div>
            </div>



            <script>
                function demo() {

                    var oristockkg = document.getElementById("oristockkg").value;

                    var profitstok = document.getElementById("profitstok");

                    profitstok.value = oristockkg;


                    var kg1price = document.getElementById("kg1price").value;

                    profit = oristockkg * kg1price;


                    var oristokprice = document.getElementById("oristokprice").value;

                    var oriprice1kg = oristokprice / oristockkg;

                    var profitrupee = profit - oristokprice;

                    let ori1kgprice = document.getElementById("oristockpricekg");

                    ori1kgprice.value = oriprice1kg;


                    let profitprice = document.getElementById("profitprice");

                    profitprice.value = profitrupee;


                    let taka = Math.floor((profitrupee / oristokprice) * 100);

                    console.log(profitrupee, oristokprice, taka);



                    let profittaka = document.getElementById("profittaka");

                    profittaka.value = taka;


                    var profitstocklprice = document.getElementById("profitstocklprice");

                    profitstocklprice.value = profit






                }
            </script>




            <script>
                const menu = document.querySelector('#mobile-menu');
                const menuLinks = document.querySelector('.navbar__menu');
                const navLogo = document.querySelector('#navbar__logo');

                //display mobile menu
                const mobileMenu = () => {

                    menu.classList.toggle('is-active');
                    menuLinks.classList.toggle('active');
                };

                menu.addEventListener('click', mobileMenu);

                //  Close mobile Menu when clicking on a menu item
                const hideMobileMenu = () => {
                    const menuBars = document.querySelector('.is-active');
                    if (window.innerWidth <= 768 && menuBars) {
                        menu.classList.toggle('is-active');
                        menuLinks.classList.remove('active');
                    }
                };

                menuLinks.addEventListener('click', hideMobileMenu);
                navLogo.addEventListener('click', hideMobileMenu);
            </script>


</body>

</html>