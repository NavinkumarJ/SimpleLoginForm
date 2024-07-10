<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
        body{
    background-image: url(bg.jpg);
    background-position:contain;
    background-size: contain;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center ;
    flex-direction: column;
}
label{
    font-size: 15px;
}
.login-box{
    padding: 50px;
    background-color:#ffffff73;
    border: 1px solid black;
    border-radius: 20px;
    margin: 25px;
    box-shadow: 1px 1px 10px 5px rgb(0, 0, 0);
    font-size: 25px;
    
}
.form-box{
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* row-gap: 10px; */
}

p{  
    padding: 10px;
    background-color: black;
    color: white;
}
#login-btn{
    margin: 20px;
    font-weight: 700;
    width: auto;
}
.btn{
    width: 100%;
    display:flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
.New-user{
    text-align: center; 
    color:black; 
    font-size:20px;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>WELCOME!</title>
</head>
<body class="container-fluid">
    <div class="login-box">
        <h1>WELCOME NEW USER :)</h1>
        <form class="form-box" action="register.php" method="post">
            <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">USERNAME</label>
            </div>
            <div class="form-floating mb-3">
            <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">PASSWORD</label>
            </div>
            <div class="form-floating">
            <input type="password" name="re-pass" class="form-control" id="floatingPassword" placeholder="Retype-Password">
            <label for="floatingPassword">RE-PASSWORD</label>
            </div>
            <div class="btn"><input type="submit" name="submit" value="Sign In" class="btn btn-outline-dark" id="login-btn"></div>
            <a class="New-user" href="index.php">Existing User?</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



<?php
    if(isset($_POST["submit"])){
        if(empty($_POST["username"])){
            echo "<p> ENTER USERNAME </p>";
        }
        else if(empty($_POST["pass"])){
            echo "<p> ENTER PASSWORD </p>";
        }
        else if(empty($_POST["re-pass"])){
            echo "<p> CONFIRM PASSWORD </p>";
        }
        else{
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $re_pass = $_POST["re-pass"];

            if($pass != $re_pass){
                echo "<p> PASSWORD DOESN'T MATCH </p>";
            }
            else{
                $server ="localhost";
                $user ="root";
                $pwd ="";
                $name ="details";

                $con = mysqli_connect($server,$user,$pwd,$name);

                $SELECT = " SELECT username FROM member_details WHERE username = '$username' ";
                $query_res = mysqli_query($con,$SELECT);
                
            
                if(mysqli_num_rows($query_res)>0){
                    echo "<p> ALREADY EXISTING USER </p>";
                }
                else{
                    $INSERT = " INSERT INTO member_details(username,pass,re_pass) VALUES('$username', '$pass', '$re_pass') ";
                    $query_res = mysqli_query($con,$INSERT);
                    echo "<p> REGISTERED SUCCESSFULLY </p>";   
                }
            }
            
        }        
    }
?>