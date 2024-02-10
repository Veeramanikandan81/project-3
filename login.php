<?php
    
    include("cong.php");
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌏VK.loginpage</title>
    <style>
    div{
        
        text-align: center;
        background-color: navajowhite;
    }
    .div,h1{
        text-align: center;
        color: red;
        text-decoration-style: solid;
    }
    .div,form{
        justify-content: center;
        text-decoration: double;
        font-size: larger;
        border-radius: 10px;
        border-color: brown;
        border-style: solid;
        background-color: antiquewhite;
        padding: 50px;
        display:inline-block;
        height:fit-content;
        margin-top: 5%;
        flex-grow: 1;
        margin: 3%;
    }
    .div,label{
        text-size-adjust: 20;

    }
    h2{
        color:blue;
        font-weight: bold;
        font-style: italic;
        text-align: center;
        }

    </style>

</head>
<body>
    <div>
        <h1> LOGIN FORM </h1>
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" >
            <lable> USERNAME :</lable>
            <input type="text" name="username" placeholder="enter your username "><br><br>
            <lable> PASSWORD :</lable>
            <input type="password" name="password" placeholder="enter your password"><br><br>
            <input type="submit" name ="submit">
            <button  ><a href="reg.php">NEW USER :REGISTER</a> </button>



        </form>
           
    </div>
</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username2 = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
    
    if (empty($username2) || empty($password2)) {
        echo "PLEASE ENTER USERNAME OR PASSWORD";
    } else {
        $passnew= base64_encode($password2);
    
        
        $sql1 ="SELECT * FROM user WHERE  username = '$username2'  and password = '$passnew' and ( emp_id = 11 || emp_id = 12 )";
        $result_user = mysqli_query($conn1, $sql1);
    

        if($result_user && mysqli_num_rows($result_user) > 0)
        {
            echo "LOGIN SUCCESSFUL";
            echo "<h1> HELLO {$username2} </h1>";
        }
        
        else {
        echo "INCORRECT USERNAME OR PASSWORD";
    }
    }
}
?>