<?php include 'config.php' ?>

<?php

session_start();

// if(!isset($_SESSION['username'])){

//     header('location:login.php');
// }

// $chek=$_SESSION['email'];
// echo"$chek";

if(!isset( $_SESSION['username']))
{
    header('location:login.php');
}



if (isset($_POST['ydelete'])) {

    $yid=$_POST['yid'];

 $deletewi="DELETE FROM `wishlist` WHERE wid='$yid'";
mysqli_query($conn,$deletewi);

  
}



if (isset($_POST['addc'])) {


    
    $username = $_SESSION['username'];

    $yid=$_POST['yid'];


    $addwp1 = "SELECT * FROM  `wishlist` WHERE wid='$yid'";
    $addwpresult1 = mysqli_query($conn, $addwp1);
    $rowp1 = mysqli_fetch_array($addwpresult1);



    print_r($rowp1);

    $gtotal=$rowp1[5]*$rowp1[4];
    echo"$gtotal";


    $addcn="INSERT INTO `cart`(`username`, `productimg`, `pname`, `price`, `que`, `total`) VALUES ('$username','$rowp1[2]','$rowp1[3]','$rowp1[4]','$rowp1[5]','$gtotal')";
    mysqli_query($conn, $addcn);




    $deletewi="DELETE FROM `wishlist` WHERE wid='$yid'";
    mysqli_query($conn,$deletewi);

    header("location:carttable.php");

    
}






$username=$_SESSION['username'];

$wishlist = "SELECT * FROM `wishlist` WHERE username='$username'";
$result = mysqli_query($conn,$wishlist);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ywhishliststyle.css">
    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="querys.css">
   
    <link rel="stylesheet" href="reusable.css">
    <link rel="stylesheet" href="querys.css">

    <style>
        .icon{
            color: black;
        }

        .btn-productr{
            background-color: white;
            border: none;
        }
    </style>
    <link rel="shortcut icon" href="home-img/Apple-Logo-Modern-Icon.png">
    <title>wishlist</title>
    
</head>

<body>
    
    <section class="nav sticky">
        <nav class="navigation">
            <div class="logo-img">
                <a class="logo-link" href="#"><img src="home-img/Apple-Logo-Modern-Icon.png" alt="logo" ></a>
            </div>

            <div class="ul-list">
            <ul class="nav-list">
                <li class="list-option"><a  class="link" href="product.php">product category</a> </li>
                <li class="list-option"><a  class="link" href="test3.php">best seller</a></li>
                <li class="list-option"><a  class="link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg></a></li>
                  <li class="list-option"> <a class="link" href="admin.php"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="icon">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a></li>

                  <li class="list-option"> <a class="link" href="ywhishlist.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                  </svg></a></li> 
                  <li class="list-option"><a  class="link" href="carttable.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg></a></li>
               
            </ul>
        </div>
        </nav>
    </section>





    <!--hero section-->
    <section class="mar">
        <div  >
             <h1 class="primary-head">WishList</h1>
        </div>
    </section>
    
  
    


    
    <!--fruit Section -->

    <section class="main-part container">

    
     
          
       

        
        <div class="services__wrapper">

        <?php
            while ($row = mysqli_fetch_array($result)) {
                echo'<div class="services__card">

                <div class="main-product">';

                echo "<form method='POST'>
                    <input type=hidden name=yid value=" . $row[0] . " >";

                        echo' <button class="btn-productr" name=ydelete ><svg xmlns="http://www.w3.org/2000/svg"  class="iconremove"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg> </button>';
              
                        
                          echo "<img ";
                          echo 'src="./images/';
                          echo "$row[2]";
                          echo '">';
                    

                    echo'<div class="product-price">
                         <p class="third-head">'.$row[3].'</p>';

                         echo'<p class="third-head">'.$row[4].'&#8377</p>
                     </div>';

     
                     echo'<div class="product-feature">
                         
                         <select>
                             <option value=1';?><?php if($row[5]==1){echo"selected";}echo'> 1kg</option>'?>
                             <option value="2"<?php if($row[5]==2){echo"selected";}echo'> 2kg</option>'?>
                             
                        <?php     
                         echo'</select>
                          
                    </div>';
                    
                    echo '<div class="product-feature">
                    

                        <button type=submit name=addc class="btn-product">add cart</button>

                        </form>

                    </div>   

                 </div>
     
            </div>';
            }
        ?>



    </div>


           


   
    

    </section>


    <footer class="main-part  mb">
        <div class="footer-container wish-list">
            <div class="logo-col">
                <a  href="#"><img class="new-logo" src="home-img/Apple-Logo-Modern-Icon.png" alt="logo" ></a>
                <ul class="logo-list">
                    <li> <a class="logo-main" href="https://instagram.com/the_vasani_7141" target="_self">  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="4.2rem" height="4.2rem"><radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"/><stop offset=".328" stop-color="#ff543f"/><stop offset=".348" stop-color="#fc5245"/><stop offset=".504" stop-color="#e64771"/><stop offset=".643" stop-color="#d53e91"/><stop offset=".761" stop-color="#cc39a4"/><stop offset=".841" stop-color="#c837ab"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"/><stop offset=".999" stop-color="#4168c9" stop-opacity="0"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"/><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"/><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"/></svg></a></li>
                    <li> <a class="logo-main" href="https://facebook.com/Utsav Vasani" target="_self" ><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="4.2rem" height="4.2rem"
                        viewBox="0 0 48 48"
                        style=" fill:#FA5252;"><linearGradient id="awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#0d61a9"></stop><stop offset="1" stop-color="#16528c"></stop></linearGradient><path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path><path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path><path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path><path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"></path></svg></a></li>
                    <li> <a class="logo-main" href="https://twitter.com/the_vasani_7141" target="_self"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="4.2rem" height="4.2rem"
                        viewBox="0 0 48 48"
                        style=" fill:#000000;"><path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path></svg></a></li>
                
                </ul>
    
                <p class="footer-text">Copyright &copy; 2022 by The_vasani, Inc. All rights reserved.</p>
            </div>
            <div class="address-col">
                <p class="footer-head">
                    Contact us
                </p>
                <address class="footer-addersss">
                   <p class="address"> 176,vaikunthdham soc,katargam,surat</p>
                   <p class="contact">
                    <a class="contact-no" href="tel:6351595662">6351595662</a><br>
                    <a class="mail" href="mailto:vasaniutsav2@gmail.com">vasaniutsav2@gmail.com</a>
                 </p>
                </address>
            </div>
            <nav class="nav-col">
                <p class="footer-head">
                    Account
                </p>
                <ul class="footer-nav">
                    <li> <a class="footer-link"  href="signup/signup.html" > Create account</a></li>
                    <li> <a class="footer-link" href="login/login.html" >Log in</a></li>
                    <li> <a class="footer-link" href="#" >iOS app</a></li>
                    <li> <a class="footer-link" href="#" >Android app</a></li>
                </ul>
            </nav>
            <nav class="nav-col">
                <p class="footer-head">
                    Company
                </p>
    
                <ul class="footer-nav">
                    <li> <a class="footer-link"  href="#" > About Omnifood</a></li>
                    <li> <a class="footer-link" href="#" > For Business</a></li>
                    <li> <a class="footer-link" href="#" > Cooking partners</a></li>
                    <li> <a class="footer-link" href="#" > Careers</a></li>
                </ul>
            </nav>
            <nav class="nav-col">
                <p class="footer-head">
                    Resources
                </p>
                <ul class="footer-nav">
                    <li> <a class="footer-link"  href="#" > Recipe directory</a></li>
                    <li> <a class="footer-link" href="#" > Help center</a></li>
                    <li> <a class="footer-link" href="#" > Privacy & terms</a></li>
                 
                </ul>
            </nav>
        </div>
        
    </footer>
    <section class="bg"><div></div></section>

    
</body>
</html>