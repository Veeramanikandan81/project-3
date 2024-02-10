<?php
    
    include ("cong.php");
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  🌏VK </title>
    <style>
    
    div{
        
        text-align: center;
        background-color: navajowhite  ;

    }
    h1{
        text-align:center;
        color:red;
        
    }
    h2{
        text-align:center;
        color:blue;
        
    }
    form{
        background-color:paleturquoise;
        align-items: flex-start;
        text-decoration: double;
        font-size: larger;
        border-radius: 10px;
        border-color: brown;
        border-style: solid;
        padding: 50px;
        display:inline-block;
        height:fit-content;
        width: max-content ;
        margin: 3%;
        flex-grow: 1;



    }
    .div,label{
        text-size-adjust: 20;

    }
    
        
    
    </style>

</head>
<body>
    <div >
        <h1 > REGISTRATION FORM  </h1>
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" >
            <label>USERNAME :</label>
            <input type="text" name="username" placeholder="enter your name "><br><br>
            <label>EMAIL :</label>
            <input type="email" name="email" placeholder="enter your email "><br><br>
            <label>PASSWORD :</label>
            <input type="password" name="password" placeholder="enter your password"><br><br>
            <input type="submit" name="submit">
            <button  ><a href="login2.php">            ALREADY REGISTERED :<br>
                 CLICK TO LOGIN </a> </button>
        </form>

    </div>

</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password1 = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password1)) {
        echo "PLEASE ENTER USERNAME AND PASSWORD";
    } else {
        $passnew=base64_encode($password1);

         $sql = "INSERT INTO user (username,password) VALUES ('$username','$passnew')";

        if (mysqli_query($conn1, $sql)) {
            echo "YOU ARE REGISTERED SUCCESSFULLY";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>