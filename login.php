<?php include 'config.php' ?>

<?php

session_start();

// if(!isset($_SESSION['email'])){

//     header('location:login.php');
// }

// $chek=$_SESSION['email'];
// echo"$chek";


if (isset($_POST['login'])) {




    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $email = $_POST['username'];
        $password =md5($_POST['password']);




        $qury = mysqli_query($conn, "SELECT `username`, `password` FROM `users` WHERE username='" . $email . "' AND  password='" . $password . "' AND  uflag=0 ");
        $numrows = mysqli_num_rows($qury);

        if ($numrows != 0) {

            $_SESSION['username'] = $_POST['username'];
            session_regenerate_id();

            $user_session_id = session_id();

            $same="UPDATE `users` SET `sessionid`='$user_session_id' WHERE username='".$_POST['username']."'";
            $sameq = mysqli_query($conn,$same);
            

            $_SESSION['user_session_id'] = $user_session_id;


            header('location:test3.php');

        } else {


            $qurya = mysqli_query($conn, "SELECT `username`, `password` FROM `users` WHERE username='" . $email . "' AND  password='" . $password . "' AND  uflag=1 ");
            $numrowsa = mysqli_num_rows($qurya);

            if ($numrowsa != 0) {

                $_SESSION['usernamea'] = $_POST['username'];
                header('location:y/index.php');

            }
            else{
               

                $emailisuse = 1;

            }




           
        }
    } else {


        $allfild = 1;
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../friuts/home-img/Apple-Logo-Modern-Icon.png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="signup.css">
    <title>Log In</title>
</head>

<style>
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



    .input1:focus {
        outline: none;
    }

    .icon {
        width: 100%;
        height: 7rem;
        color: white;
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

    .input {
        border-bottom: 2px solid black;
    }


    .succse {

        border-color: green;
    }

    .error {
        border-color: #e03131;
    }
    .notic{
            margin-bottom: 1rem;
            margin-top: -1rem;
            color: red;
            
        }
</style>

<body>
    <section class="main-login" id="blur">

        <div class="grid-containerf1">
            <div class="grid-2">
                <div class="grid-left">

                    <img src="../friuts/home-img/orange.jpg" class="log-img">

                </div>
                <div class="grid-right">

                    <form name="form1" class="form-login" method="POST">
                        <h2>login</h2>
                        <p class="text-log"><span>Welcome back!</span> Please login to your account.</p>
                        <div class="in-flex">
                            <label>UserName</label>
                            <input type="email" placeholder="Enter your Username" id="input" class="input" onkeyup="emaildemo(document.form1.username)" name="username">
                        </div>
                        <p class="notic" id="noticemail"></p>

                        <div class="in-flex">
                            <label>Password</label>
                            <input type="password" placeholder="Enter your password" class="input" id="input4" onkeyup="passdemo(document.form1.password)" name="password">
                        </div>
                        <p class="notic" id="noticpassword"></p>

                        <div class="in-flex cheak">
                            <div class="cheak-flex">
                            <a class="login-link" href="emailfo.php">Forgot Password?</a>
                            </div>

                          
                        </div>

                        <button type="submit" name="login" class="input m-b">LogIn</button>

                    </form>

                    <div class="in-flex sign-up">
                        <p class="sub-text">New User?</p> <a class="login-link" href="signup.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <div class="popup1" id="popup1">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
        var x = "<?php echo "$allfild" ?>";


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
        var y = "<?php echo "$emailisuse" ?>";

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
        let email1 = document.getElementById("input");
        let pass = document.getElementById("input4");


        function emaildemo(username) {

            console.log(username);

            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (username.value.match(mailformat)) {
                email1.classList.remove("error");
                email1.classList.add("succse");
                document.getElementById("noticemail").innerHTML = "";

            } else {
                email1.classList.remove("succse");
                email1.classList.add("error");
                document.getElementById("noticemail").innerHTML = "Must be in valid format.";
            }



        }



        function passdemo(password) {


            //password between 7 to 15 characters which contain at least one numeric digit and a special character




            var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
            if (password.value.match(paswd)) {

                pass.classList.remove("error");
                pass.classList.add("succse");
                document.getElementById("noticpassword").innerHTML = "";

            } else {
                pass.classList.remove("succse");
                pass.classList.add("error");
                document.getElementById("noticpassword").innerHTML = "password between 7 to 15 characters which contain at least one numeric digit and a special character";
            }



        }
    </script>






</body>

</html>