<?php include '../config.php' ?>


<?php


require_once('../conactionadmin.php');

if (isset($_POST['adminlogout'])) {

    header('location:../logout.php');
}


$adminupdate="SELECT * FROM `users` WHERE 	username='$adminusername'";
$qury=mysqli_query($conn,$adminupdate);
$row=mysqli_fetch_array($qury);


    if(isset($_POST['pup'])){

       
        header('location:../logout.php');
       
        
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
    <link rel="stylesheet" href="dashprofile.css">

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


                <a href="stock.php">
                    <span class="material-symbols-sharp">inventory</span>
                    <h3>stock</h3>
                </a>


                <a href="profile.php" class="active">
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
                    <a href="#home" id="navbar__logo">Profile</a>
                </div>

            </nav>


            <div class="prfilemain">


                <div class="left">

                    <div class="lefttop">
                        <div class="profileicon">

                            <span class="material-symbols-sharp">person</span>


                        </div>

                        <div class="editprofile">
                            <h2>profile</h2>
                        </div>

                    </div>

                    <form action="" method="POST">

                        <div class="inputleft">
                            <!-- <label for="">First Name</label>
                            <input type="text" name="fname" value=""> -->
                            <label for="">Email ADdress</label>
                            <input type="email" name="pemail" value="<?php echo"$row[1]";?>">
                        </div>

                </div>
                <div class="right">

                    <div class="lefttop">



                    </div>

                    <div class="inputright">
                        <!-- <label for="">Last Name</label>
                        <input type="text" name="lname">
                        <label for="">Contact No</label>
                        <input type="number" name="pho"> -->
                    </div>

                    <div class="editprofile">
                        <div class="lastbtn">
                            <button type="submit" name="pup" class="editbtn">logout</button>
                        </div>
                    </div>
                    </form>

                </div>
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



</body>

</html>