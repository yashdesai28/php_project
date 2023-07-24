<?php include '../config.php' ?>


<?php


require_once('../conactionadmin.php');

if(isset($_POST['adminlogout'])){

    header('location:../logout.php');

}

if (isset($_POST['delete'])) {

 
    $pdelete = "DELETE FROM `tblproduct` WHERE pname='" . $_POST['pid'] . "'";
    $result = mysqli_query($conn, $pdelete);


    $pdelete1 = "DELETE FROM `stock` WHERE pname='" . $_POST['pid'] . "'";
    $result1 = mysqli_query($conn, $pdelete1);
}


$showsotck="SELECT * FROM `stock` ";
$result = mysqli_query($conn,$showsotck);

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
    <link rel="stylesheet" href="stockstyle.css">
 
    <link rel="stylesheet" href="dashproduct.css">



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


                <a href="orders.php">
                    <span class="material-symbols-sharp">receipt_long</span>
                    <h3>orders</h3>
                </a>


                <a href="add_product.php">
                    <span class="material-symbols-sharp">add</span>
                    <h3>add product</h3>
                </a>


                <a href="stock.php" class="active">
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
                    <a href="#home" id="navbar__logo">Stocks</a>
                   
            </nav>



            <div class="tablestock">





                <?php echo '<table class="table" id="myTable">';
                echo "<thead>";
                echo "<tr>";
                echo "<th>product name</th>";
                echo "<th>Purchase Stock</th>";
                echo "<th>Stock Purchase Price</th>";
                echo "<th>Per(1KG)Price</th>";
                echo "<th>pcatagory</th>";
                echo "<th>Image</th>";
                echo "<th>Sale Price(1KG)</th>";
                echo "<th>Expected Sales Stock Price</th>";
                echo "<th>Date</th>";
                echo "<th>Edit</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";


                while ($row = mysqli_fetch_array($result)) {


                    echo "<tr>";

                    echo '<td data-label="product name">';
                    echo "$row[1]";
                    echo "</td>";
                    echo '<td data-label="Purchase Stock">';
                    echo "$row[2]";
                    echo "</td>";
                   
                    echo '<td data-label="Stock Purchase Price">';
                    echo "$row[3]</td>";
                    echo '<td data-label="Per(1KG)Price">';
                    echo "$row[4]</td>";
                    echo '<td data-label="Per(1KG)Price">';
                    echo "$row[5]</td>";
                    echo '<td data-label="image">';
                    echo "<img ";
                    echo 'src="../images/';
                    echo "$row[6]";
                    echo '">';
                    echo "</td>";
                    echo '<td data-label="Sale Price(1KG)">';
                    echo "$row[7]</td>";
                    echo '<td data-label="Expected Sales Stock Price">';
                    echo "$row[8]</td>";
                    echo '<td data-label="Date">';
                    echo "$row[9]</td>";
                    echo '<td data-label="Edit">';

                    echo '<a href="add_product.php?pname=' . $row[1] . '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                  </svg>
                  </a>';

                    echo "</td>";

                    echo '<td data-label="Action">';
                    echo "<form method='POST'>
                            <input type=hidden name=pid value=" . $row[1] . " >";


                    echo '<button class="btn-pro-svg" name=delete >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>';

                    echo "</td>";


                    echo "</form>";



                    echo "</tr>";
                }

                echo "</tbody>";

                echo "</table>";

                ?>
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