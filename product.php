<?php include 'config.php' ?>


<?php


session_start();


if (isset($_POST['addw'])) {


    $username = $_SESSION['username'];

    $pid = $_POST['pid'];
    $addwp = "SELECT * FROM `tblproduct` WHERE pid='$pid'";
    $addwpresult = mysqli_query($conn, $addwp);
    $rowp = mysqli_fetch_array($addwpresult);

    $parchekg = $_POST['parchekg'];

    $addnw = "INSERT INTO `wishlist`(`username`, `productimg`, `pname`, `pprice`, `parcheskg`) VALUES ('$username','$rowp[3]','$rowp[1]','$rowp[2]','$parchekg')";
    mysqli_query($conn, $addnw);


    print_r($rowp);

    header("location:ywhishlist.php");
}



if (isset($_POST['addc'])) {


    
    $username = $_SESSION['username'];

    $pid1 = $_POST['pid'];


    $addwp1 = "SELECT * FROM `tblproduct` WHERE pid='$pid1'";
    $addwpresult1 = mysqli_query($conn, $addwp1);
    $rowp1 = mysqli_fetch_array($addwpresult1);

    $parchekg1 = $_POST['parchekg'];

    print_r($rowp1);
$ctotal= $parchekg1 *$rowp1[2];

    $addcn="INSERT INTO `cart`(`username`, `productimg`, `pname`, `price`, `que`, `total`) VALUES ('$username','$rowp1[3]','$rowp1[1]','$rowp1[2]','$parchekg1','$ctotal')";
    mysqli_query($conn, $addcn);

    header("location:carttable.php");





    
}





$product = "SELECT * FROM `tblproduct`";
$result = mysqli_query($conn, $product);
$result1 = $result;



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="reusable.css">
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="querys.css">
    <link rel="shortcut icon" href="home-img/Apple-Logo-Modern-Icon.png">




    <title>Food Mart</title>
    <style>
        .icon {
            background-color: white;
        }

        .btn-product {
            background-color: white;
        }

        .pagination div {
            display: inline-block;
            margin: 0 10px;
        }

        .prev,
        .next,
        .prev1,
        .next1 {
            color: #000;
            border: 1px solid #000;
            font-size: 15px;
            padding: 7px 15px;
            cursor: pointer;
            width: 10rem;

        }

        .page,
        .page-num,.page1,
        .page-num1  {
            font-size: 2.1rem;
        }

        .hide {
            display: none;
        }

        .show {
            display: block;
            animation: show .5s ease;
        }

        @keyframes show {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;

        }

select{
    width: 7rem;
}

.product-feature{
    margin-top: 1rem;
}

        @media(max-width:56em) {


            .footer-container {

                grid-template-columns: repeat(2, 1fr);
            }


            .grid-3 {
                grid-template-columns: repeat(2, 1fr);
            }


            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }

            html {
                font-size: 50%;
            }

        }



        @media(max-width:37.6em) {
            .grid-3 {
                grid-template-columns: 1fr;
            }

            .grid-4 {
                grid-template-columns: 1fr;
            }

            .footer-container {

                grid-template-columns: 1fr;
            }

            html {
                font-size: 44%;
            }

        }


        .disabled,
        .disabled{
	border-color: gray;
	color:gray;
	pointer-events: none;
}
    </style>
</head>

<body>
    
    <section class="nav sticky">
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


    <section class=" bg-product">
        <div>
            <h1 class="primary-head">Our products</h1>
        </div>
    </section>




    <section class="margin-up">

        <h2 class="test-head center-head ">Our Fruits</h2>
        <div class="pro-flex">
            <hr class="under-line">
        </div>
    </section>





    <section class="main-part container margin-top-remove">
        <div class="grid-3">




            <?php


            while ($row = mysqli_fetch_array($result)) {

                if ('fruits' == $row[4]) {

                    echo '<div class="main-product">';
                    echo '<div class="up">';
                    echo "<img ";
                    echo 'src="./images/';
                    echo "$row[3]";
                    echo '">';
                    echo "</div>";
                    echo '<div class="down">';

                    echo '<div class="product-price">';
                    echo '<p class="third-head">';
                    echo "$row[1]";
                    echo "</p>";
                    echo '<p class="third-head">';
                    echo "$row[2] &#8377</p>";
                    echo "</div>";


                    echo "<form method='POST'>
                        <input type=hidden name=pid value=" . $row[0] . " >";

                    echo ' <div class="product-feature">
                            <button type=submit name=addw class="btn-product">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                   
                            <select name=parchekg value=1 required>
                                <option value=1>1kg</option>
                                <option value=2>2kg</option>
                            </select>
                            <button  type=submit name=addc class="btn-product">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                            </button>
                        
                        </div>

                    </form>

                </div>
            </div>';
                }
            }



            ?>





        </div>



    </section>

    <center>
        <div class="pagination">
            <div class="prev">Prev</div>
            <div class="page">Page <span class="page-num"></span></div>
            <div class="next">Next</div>
        </div>
    </center>




    <section class="margin-up">

        <h2 class="test-head center-head ">Our Vegetables</h2>
        <div class="pro-flex">
            <hr class="under-line">
        </div>
    </section>




    <section class="main-part container margin-top-remove ">
        <div class="grid-4">

            <?php



            $product = "SELECT * FROM `tblproduct`";
            $result = mysqli_query($conn, $product);
            $result1 = $result;



            while ($row1 = mysqli_fetch_array($result1)) {


                if ('vegetables' == $row1[4]) {

                    echo '<div class="main-product">';
                    echo '<div class="up">';
                    echo "<img ";
                    echo 'src="./images/';
                    echo "$row1[3]";
                    echo '">';
                    echo "</div>";
                    echo '<div class="down">';

                    echo '<div class="product-price">';
                    echo '<p class="third-head">';
                    echo "$row1[1]";
                    echo "</p>";
                    echo '<p class="third-head">';
                    echo "$row1[2] &#8377</p>";
                    echo "</div>";

                    echo "<form method='POST'>
                    <input type=hidden name=pid value=" . $row1[0] . " >";

                echo ' <div class="product-feature">
                        <button type=submit name=addw class="btn-product">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </button>
               
                        <select name=parchekg >
                            <option value=1>1kg</option>
                            <option value=2>2kg</option>
                        </select>
                        <button type=submit name=addc  class="btn-product">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                        </button>
                    
                    </div>

                </form>
                </div>
            </div>';
                }
            }


            ?>





        </div>
    </section>

    <center>
        <div class="pagination">
            <div class="prev1">Prev</div>
            <div class="page1">Page <span class="page-num1"></span></div>
            <div class="next1">Next</div>
        </div>
    </center>



    <footer class="main-part  mb">
        <div class="footer-container">
            <div class="logo-col">
                <a href="#"><img class="new-logo" src="home-img/Apple-Logo-Modern-Icon.png" alt="logo"></a>
                <ul class="logo-list">
                    <li> <a class="logo-main" href="https://instagram.com/the_vasani_7141" target="_self"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="4.2rem" height="4.2rem">
                                <radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#fd5" />
                                    <stop offset=".328" stop-color="#ff543f" />
                                    <stop offset=".348" stop-color="#fc5245" />
                                    <stop offset=".504" stop-color="#e64771" />
                                    <stop offset=".643" stop-color="#d53e91" />
                                    <stop offset=".761" stop-color="#cc39a4" />
                                    <stop offset=".841" stop-color="#c837ab" />
                                </radialGradient>
                                <path fill="url(#yOrnnhliCrdS2gy~4tD8ma)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z" />
                                <radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#4168c9" />
                                    <stop offset=".999" stop-color="#4168c9" stop-opacity="0" />
                                </radialGradient>
                                <path fill="url(#yOrnnhliCrdS2gy~4tD8mb)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z" />
                                <path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z" />
                                <circle cx="31.5" cy="16.5" r="1.5" fill="#fff" />
                                <path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z" />
                            </svg></a></li>
                    <li> <a class="logo-main" href="https://facebook.com/Utsav Vasani" target="_self"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="4.2rem" height="4.2rem" viewBox="0 0 48 48" style=" fill:#FA5252;">
                                <linearGradient id="awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1" x1="6.228" x2="42.077" y1="4.896" y2="43.432" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#0d61a9"></stop>
                                    <stop offset="1" stop-color="#16528c"></stop>
                                </linearGradient>
                                <path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z"></path>
                                <path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path>
                                <path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path>
                                <path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z"></path>
                            </svg></a></li>
                    <li> <a class="logo-main" href="https://twitter.com/the_vasani_7141" target="_self"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="4.2rem" height="4.2rem" viewBox="0 0 48 48" style=" fill:#000000;">
                                <path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"></path>
                            </svg></a></li>

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
                    <li> <a class="footer-link" href="signup/signup.html"> Create account</a></li>
                    <li> <a class="footer-link" href="login/login.html">Log in</a></li>
                    <li> <a class="footer-link" href="#">iOS app</a></li>
                    <li> <a class="footer-link" href="#">Android app</a></li>
                </ul>
            </nav>
            <nav class="nav-col">
                <p class="footer-head">
                    Company
                </p>

                <ul class="footer-nav">
                    <li> <a class="footer-link" href="#"> About Omnifood</a></li>
                    <li> <a class="footer-link" href="#"> For Business</a></li>
                    <li> <a class="footer-link" href="#"> Cooking partners</a></li>
                    <li> <a class="footer-link" href="#"> Careers</a></li>
                </ul>
            </nav>
            <nav class="nav-col">
                <p class="footer-head">
                    Resources
                </p>
                <ul class="footer-nav">
                    <li> <a class="footer-link" href="#"> Recipe directory</a></li>
                    <li> <a class="footer-link" href="#"> Help center</a></li>
                    <li> <a class="footer-link" href="#"> Privacy & terms</a></li>

                </ul>
            </nav>
        </div>

    </footer>
    <section class="bg">
        <div></div>
    </section>



    <script>
        const galleryItems = document.querySelector(".grid-3").children;
        const prev = document.querySelector(".prev");
        const next = document.querySelector(".next");
        const page = document.querySelector(".page-num");
        const maxItem = 3;
        let index = 1;
        console.log(galleryItems)

        const pagination = Math.ceil(galleryItems.length / maxItem);
        console.log('grid=3', pagination)

        prev.addEventListener("click", function() {
            index--;
            check();
            showItems();
        })
        next.addEventListener("click", function() {
            index++;
            check();
            showItems();
        })

        function check() {
            if (index == pagination) {
                next.classList.add("disabled");
            } else {
                next.classList.remove("disabled");
            }

            if (index == 1) {
                prev.classList.add("disabled");
            } else {
                prev.classList.remove("disabled");
            }
        }

        function showItems() {
            for (let i = 0; i < galleryItems.length; i++) {
                console.log('jeybhb');
                galleryItems[i].classList.remove("show");
                galleryItems[i].classList.add("hide");


                if (i >= (index * maxItem) - maxItem && i < index * maxItem) {
                    // if i greater than and equal to (index*maxItem)-maxItem;
                    // means  (1*8)-8=0 if index=2 then (2*8)-8=8
                    galleryItems[i].classList.remove("hide");
                    galleryItems[i].classList.add("show");
                }
                page.innerHTML = index;
            }


        }

        window.onload = function() {
            showItems();
            check();
        }
    </script>




    <script>
        const galleryItems1 = document.querySelector(".grid-4").children;
        const prev1 = document.querySelector(".prev1");
        const next1 = document.querySelector(".next1");
        const page1 = document.querySelector(".page-num1");
        const maxItem1 = 3;
        let index1 = 1;
        console.log(galleryItems1)

        const pagination1 = Math.ceil(galleryItems1.length / maxItem1);
        console.log(pagination1)

        prev1.addEventListener("click", function() {
            index1--;
            check1();
            showItems1();
        })
        next1.addEventListener("click", function() {
            index1++;
            check1();
            showItems1();
        })

        function check1() {
            if (index1 == pagination1) {
                next1.classList.add("disabled");
            } else {
                next1.classList.remove("disabled");
            }

            if (index1 == 1) {
                prev1.classList.add("disabled");
            } else {
                prev1.classList.remove("disabled");
            }
        }

        function showItems1() {
            for (let i = 0; i < galleryItems1.length; i++) {
                console.log('jeybhb');
                galleryItems1[i].classList.remove("show");
                galleryItems1[i].classList.add("hide");


                if (i >= (index1 * maxItem1) - maxItem1 && i < index1 * maxItem1) {
                    // if i greater than and equal to (index*maxItem)-maxItem;
                    // means  (1*8)-8=0 if index=2 then (2*8)-8=8
                    galleryItems1[i].classList.remove("hide");
                    galleryItems1[i].classList.add("show");
                }
                page1.innerHTML = index1;
            }


        }

        window.onload1 = function() {
            showItems1();
            check1();
        }
    </script>






</body>