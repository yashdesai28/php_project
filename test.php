<?php include 'config.php' ?>


<?php




if(isset($_POST['sub'])){


    $email=$_POST['email1'];

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo"sachu";

    }
    else{
        echo"not";
    }







if(isset($_POST['radio']))
{
echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
}
foreach($_POST['hello'] as $ui1){

    $ui=$ui." ".$ui1;
}

echo"$ui";

echo"===========================";




}


foreach($_POST['y']as $tt){

    echo"$tt";

    
}


?>


<html>
    <body>

    <form action="" method="POST">

    <p>email</p>
    <input type="email" name="email1">
        
    <input type="radio" id="html" name="radio" value="male"><p>html</p>
    <input type="radio" id="html" name="radio" value="female"><p>css</p>


    h<input type="checkbox" value="h" name="y[]">
    e<input type="checkbox" value="e" name="y[]">
    l<input type="checkbox" value="l" name="y[]">


    <select name="hello[]" id="" multiple>
        <option value="yash">yash</option>
        <option value="utsav">utsav</option>
        <option value="manav">manav</option>
        
    </select>

    <button type="submit" name="sub">submit</button>

    </form>
    
    </body>
</html>
