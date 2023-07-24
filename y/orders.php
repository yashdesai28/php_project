<?php include '../config.php' ?>


<?php


require_once('../conactionadmin.php');

if (isset($_POST['adminlogout'])) {

    header('location:../logout.php');
}


$showoder = "SELECT * FROM `order` ";
$result = mysqli_query($conn, $showoder);



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
    <link rel="stylesheet" href="dashbordorderstyle.css">



    

    <!-- Serch Start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- Serch End -->


</head>


<style>
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
        -webkit-background-clip: text;
        -moz-background-clip: text;
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
</style>


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


                <a href="orders.php" class="active">
                    <span class="material-symbols-sharp">receipt_long</span>
                    <h3>orders</h3>
                </a>


                <a href="add_product.php">
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
                    <a href="#home" id="navbar__logo">orders</a>


                </div>
            </nav>

            <div class="tableorder">






                <table class="table" id="myTable" >
                    <thead>
                        <tr>
                            <th>Order NO</th>
                            <th>oemail</th>
                            <th>customer name</th>
                            <th>phone number</th>
                            <th>city</th>
                            <th>Area</th>
                            <th>address</th>
                            <th>pincode</th>

                            <th>date</th>

                            <th>product name</th>

                            <th>quantity</th>
                            <th>1kg price</th>
                            <th>total</th>


                        </tr>

                    </thead>
                    <tbody>

                        <?php

                        $gmaintotal = 0;

                        while ($row = mysqli_fetch_array($result)) {
                            $mpname = explode(",", $row[8]);
                            $oneprice = (explode(" ", $row[9]));
                            $mque = (explode(" ", $row[10]));
                            $total = (explode(" ", $row[11]));





                            // print_r($mpname);
                            // print_r($mque);

                            $cout = 0;

                            foreach ($mpname as $val) {

                                $cout++;
                            }

                            echo '<tr>';
                            echo '<td data-label="order number" rowspan="' . $cout - 1 . '">' . $row[0] . '</td>';
                            echo '<td data-label="email" rowspan="' . $cout - 1 . '">' . $row[1] . '</td>';
                            echo '<td data-label="customer name" rowspan="' . $cout - 1 . '">' . $row[2] . '</td>';
                            echo '<td data-label="phonumber" rowspan="' . $cout - 1 . '">' . $row[4] . '</td>';
                            echo '<td data-label="city" rowspan="' . $cout - 1 . '">' . $row[5] . '</td>';
                            echo '<td data-label="Area" rowspan="' . $cout - 1 . '">' . $row[6] . '</td>';
                            echo '<td data-label="address" rowspan="' . $cout - 1 . '">' . $row[7] . '</td>';
                            echo '<td data-label="pincode" rowspan="' . $cout - 1 . '">' . $row[12] . '</td>';
                            echo '<td data-label="date" rowspan="' . $cout - 1 . '">' . $row[14] . '</td>';

                            for ($i = 1; $i < $cout; $i++) {



                                echo '<td data-label="product name">' . $mpname[$i] . '</td>';

                                echo '<td data-label="quantity">' . $mque[$i] . '</td>';

                                echo '<td data-label="price">' . $oneprice[$i] . '</td>';

                                echo '<td data-label="total">' . $total[$i] . '</td>';

                                $gmaintotal += $total[$i];





                                echo '</tr>';
                            }


                            echo '<tr>
                        <td  colspan="12">grandtotal</td>';
                            echo '<td>' . $gmaintotal . '</td>';

                            $gmaintotal = 0;


                            echo '</tr>';



                        
                        }






                        ?>


                    </tbody>
                </table>


            </div>

        </div>



    </div>


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




   <!-- Serch Start-->
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- Serch End-->


</body>

</html>