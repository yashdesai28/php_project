<?php include 'config.php' ?>

<?php

session_start();


if (isset($_POST['logout'])) {



    $chek = $_SESSION['username'];
    session_destroy();
    header('location:login.php');
}

if (!isset($_SESSION['username'])) {

    header('location:login.php');
}

$username = $_SESSION['username'];

if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) &&!empty($_POST['area']) &&!empty($_POST['city'] &&!empty($_POST['state']))) {



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
        $address = $_POST['address'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $area=$_POST['area'];

        $edit = "UPDATE `reg` SET `fname`='$fname',`lname`='$lname',`phonumber`='$phone',`pincode`='$pincode',`city`='$city',`area`='$area',`address`='$address' WHERE email='" . $_SESSION['username'] . "' ";
        $reg = mysqli_query($conn, $edit);

        
        $succse=1;

    } else {
       
        $validinfo = 1;
    }
}
else{

    echo"bharo";
}






$showuser = "SELECT * FROM `reg` WHERE email='" . $_SESSION['username'] . "' ";
$qur = mysqli_query($conn, $showuser);
$row = mysqli_fetch_array($qur);


if (isset($_POST['imgup'])) {


    $imgname = $_FILES['uplodeimg']['name'];
    $tmpname = $_FILES['uplodeimg']['tmp_name'];
    $dec = "images/" . $imgname;


    $img_img = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));

    $allow_type = array('png', 'jpg', 'jpeg', 'webp');

    if (in_array($img_img, $allow_type)) {

        move_uploaded_file($tmpname, $dec);

        $uplodaimg = "UPDATE `reg` SET `image`='$imgname'WHERE email='" . $_SESSION['username'] . "'";
        $qury = mysqli_query($conn, $uplodaimg);

        header('location:admin.php');
    }
}




$showoder = "SELECT * FROM `order` WHERE `oemail`='$username' ";
$result = mysqli_query($conn, $showoder);









?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="admin.css" rel="stylesheet">
    
    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="reusable.css">
    


    <title>admin</title>

    <style>
        .in1 {
            padding: 0.8rem;
            background-color: #e03131;
            color: white;
            border: none;
            cursor: pointer;
        }

        .in1u {
            padding: 0.8rem;
            background-color: #e03131;
            color: white;
            border: none;
            cursor: pointer;
            width: 30rem;
        }


        .btnin {
            padding: 0.8rem;
            background-color: #e03131;
            color: white;
            border: none;
            cursor: pointer;
        }

        .fle1 {
            display: flex;
            flex-direction: row;
            margin-bottom: 1.7rem;

        }

        .lf {
            margin-right: 5rem
        }

        .lf1 {
            margin-left: 2rem;
            margin-right: 2rem;
        }

        .infl {
            padding: 0.8rem;

        }

        .in {
            padding: 0.8rem;

        }

        .notic {
            margin-bottom: 1rem;
            margin-top: -1rem;
            color: red;

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
            font-size: 2.rem;

        }

        .otpsub {
            margin-top: 1.5rem;
        }

        .maindec {
            margin-top: 1rem;
            font-size: 2.7rem;
        }
        
.popup img {
    width: 8rem;
    height: 6rem;
    margin-bottom: 1rem;
}

h3 {
    font-size: 20px;
}

.dec {
    margin-bottom: 1rem;
}

#popotp {
    width: 20rem;
    height: 2.5rem;
    margin-bottom: 1.4rem;

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

.img{
    width: 80%;
}




.table{
	width: 100%;
	border-collapse: collapse;
}

.table td,.table th{
  padding:12px 15px;
  border:1px solid #ddd;
  text-align: center;
  font-size:16px;
}

.table th{
	background-color: #e03131;
	color:#ffffff;
}



.tableproduct{
	margin-top: 3rem;
}

.tablehed{
	margin-bottom: 2rem;
	display: grid;
	grid-template-columns: 1fr 1fr;
	
	height: 6rem;
}


/*responsive*/

@media(max-width: 500px){
	.table thead{
		display: none;
	}

	.table, .table tbody, .table tr, .table td{
		display: block;
		width: 116%;
	}
	.table tr{
		margin-bottom:15px;
	}
	.table td{
		text-align: right;
		padding-left: 50%;
		text-align: right;
		position: relative;
	}
	.table td::before{
		content: attr(data-label);
		position: absolute;
		left:0;
		width: 50%;
		padding-left:15px;
		font-size:15px;
		font-weight: bold;
		text-align: left;
	}

	.tablehed{
		grid-template-columns: 1fr;

	}

	.rightp{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		

	}


	.rightp input{
		width: 100%;

	}

	.editbtn{
		width: 100%;
	}
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





    <section class="utsav">
        <div class="main">
            <div class="left">
                <form class="lform" method="POST" enctype="multipart/form-data">
                    <div class="btn">
                        <?php

                        echo '<img src="images/' . $row[5] . '" class="img">' ?>
                        <input type="file" name="uplodeimg" class="inputf">

                        <button type="submit" class="btnin" name="imgup">upload</button>
                    </div>
                </form>
            </div>
            <div class="right">





                <form class="rform" method="POST" name="form1">

                    <div class="m1">

                        <div class="fle1">
                            <label class="lf">Fname</label>
                            <input type="text" class="infl" id="fname" onkeyup="demo(document.form1.fname)" name="fname" value="<?php print_r($row[1]); ?>" placeholder="surat">

                            <label class="lf1">Lname</label>
                            <input type="text" class="infl" onkeyup="demo(document.form1.lname)" name="lname" value="<?php print_r($row[2]); ?>" placeholder="surat">

                        </div>



                    </div>
                    <p class="notic" id="noticname"></p>
                    <div class="f">
                        <label>email</label>
                        <input type="email" class="in" disabled value="<?php print_r($row[3]); ?>" placeholder="abc@gmail.com">
                    </div>
                    <div class="f">
                        <label>phone</label>
                        <input type="number" class="in" onkeyup="phnodemo(document.form1.phone)" name="phone" value="<?php print_r($row[4]); ?>" placeholder="+91">
                    </div>
                    <p class="notic" id="noticnumber"></p>


                    <!-- <div class="f">
    <label>gender</label>
    <div class="inn">

        <input type="radio" name="gender">
        <label>male</label>
        <input type="radio" name="gender">
        <label>female</label>
    </div>

</div> -->

                    <div class="f">
                        <label>pincode</label>
                        <div class="inner">
                            <input type="text" class="in" id="pincode" name="pincode" value="<?php print_r($row[6]); ?>">
                            <button class="in1" type="button" value="Get Details" onclick="get_details()">Get Details</button>
                        </div>
                    </div>

                    <div class="m1">

                        <div class="fle">
                            <label class="mar">Area</label>
                            <input type="text" name="area" class="in" id="area">
                        </div>

                        <div class="fle">
                            <label class="mar">city</label>
                            <input type="text" name="city" class="in" id="city">
                        </div>

                        <div class="fle">
                            <label class="mar">state</label>
                            <input type="text" name="state" class="in" id="state">
                        </div>


                    </div>

                    <div class="fle">
                        <label class="mar">Address</label>
                        <textarea class="texta" name="address"><?php print_r($row[9]); ?></textarea>
                    </div>


                    <div class="f">

                        <div class="inner">
                            <button type="submit" class="in1u" name="updateinfo">Update</button>
                            <button class="in1u" name="logout">logout</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <div class="container">

<div class="khali">

</div>



<section class="margin-up">

<h2 class="test-head center-head ">previous order</h2>
<div class="pro-flex">
    <hr class="under-line">
</div>
</section>


<div class="bharelo">


    <!--nevbar section-->
   

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
                                <path fill="url(#awSgIinfw5_FS5MLHI~A9a_yGcWL8copNNQ_gr1)" d="M42,40c0,1.105-0.895,2-2,2H8c-1.105,0-2-0.895-2-2V8c0-1.105,0.895-2,2-2h32	c1.105,0,2,0.895,2,2V40z">
                                </path>
                                <path d="M25,38V27h-4v-6h4v-2.138c0-5.042,2.666-7.818,7.505-7.818c1.995,0,3.077,0.14,3.598,0.208	l0.858,0.111L37,12.224L37,17h-3.635C32.237,17,32,18.378,32,19.535V21h4.723l-0.928,6H32v11H25z" opacity=".05"></path>
                                <path d="M25.5,37.5v-11h-4v-5h4v-2.638c0-4.788,2.422-7.318,7.005-7.318c1.971,0,3.03,0.138,3.54,0.204	l0.436,0.057l0.02,0.442V16.5h-3.135c-1.623,0-1.865,1.901-1.865,3.035V21.5h4.64l-0.773,5H31.5v11H25.5z" opacity=".07"></path>
                                <path fill="#fff" d="M33.365,16H36v-3.754c-0.492-0.064-1.531-0.203-3.495-0.203c-4.101,0-6.505,2.08-6.505,6.819V22h-4v4	h4v11h5V26h3.938l0.618-4H31v-2.465C31,17.661,31.612,16,33.365,16z">
                                </path>
                            </svg></a></li>
                    <li> <a class="logo-main" href="https://twitter.com/the_vasani_7141" target="_self"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="4.2rem" height="4.2rem" viewBox="0 0 48 48" style=" fill:#000000;">
                                <path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                                </path>
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





    

    <div class="popup1" id="popup3">

        <div class="errorimg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon1">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
</svg>

        </div>

        <div class="maindec">
            <h2>thank you</h2>
        </div>

        <div class="decerror">
            <h3>your detail has ben changed</h3>
        </div>

        <form action="" method="POST">


        <button type="submit" id="otpsub" name="passchange" onclick="closepopup2()">close</button>

        </form>


    </div>






    <script>
        function get_details() {
            var pincode = jQuery('#pincode').val();
            if (pincode == '') {
                jQuery('#city').val('');
                jQuery('#state').val('');
            } else {
                jQuery.ajax({
                    url: 'get.php',
                    type: 'post',
                    data: 'pincode=' + pincode,
                    success: function(data) {
                        if (data == 'no') {
                            alert('Wrong Pincode');
                            jQuery('#city').val('');
                            jQuery('#state').val('');
                        } else {
                            if (pincode == 395006 || pincode == 395004) {

                                var getData = $.parseJSON(data);
                                jQuery('#area').val(getData.area);
                                jQuery('#city').val(getData.city);
                                jQuery('#state').val(getData.state);

                            } else {

                                jQuery('#pincode').val('');
                                alert('Pincode for Katargam:395004,Varachha:395006 is only valid.Delivery is available for only this pincodes.Other pincodes are not valid.');
                            }

                        }
                    }
                });
            }
        }
    </script>





    <script>
        function demo(FirstName) {




            var regEx = /^[A-Za-z]+$/;
            if (FirstName.value.match(regEx)) {

                document.getElementById("noticname").innerHTML = "";

            } else {
                console.log('ujbuygb');
                document.getElementById("noticname").innerHTML = "Only Characters without whitespaces.";

            }



        }







        function phnodemo(phonumber) {


            var phoneno = /^\d{10}$/;

            if (phonumber.value.match(phoneno)) {

                document.getElementById("noticnumber").innerHTML = "";
            } else {

                document.getElementById("noticnumber").innerHTML = "Contact Number Must be numbers and could start with 6,7,8,9 only.";
            }



        }
    </script>




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
        var j = "<?php echo "$succse" ?>";

        let popup3 = document.getElementById("popup3");

        let blurr = document.getElementById("blur");



        if (j == 1) {

            popup3.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup2() {
            popup3.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>






</body>

</html>