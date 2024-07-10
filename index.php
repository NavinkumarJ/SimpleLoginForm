<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
        body{
    background-image: url(bg.jpg);
    /* background-position:top; */
    background-size:cover;
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
        <h1>LOG IN :)</h1>
        <form class="form-box" action="index.php" method="post">
            <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">USERNAME</label>
            </div>
            <div class="form-floating">
            <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">PASSWORD</label>
            </div>
            <div class="btn"><input type="submit" name="submit" value="Log In" class="btn btn-outline-dark" id="login-btn"></div>
            <a class="New-user" href="register.php">New User?</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<?php
    if(isset($_POST["submit"])){
        if(empty($_POST["username"])){
            echo "<p> USERNAME MISSING </p>";
        }
        else if(empty($_POST["pass"])){
            echo "<p> PASSWORD MISSING </p>";
        }
        else{
            // echo "LOGGED IN SUCCESSFULLY";
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $con = mysqli_connect("localhost","root","","details");
            $sql = "SELECT * FROM Member_details WHERE username='$username' AND pass='$pass' ";
            $res = mysqli_query($con,$sql);
            $res_check = mysqli_num_rows($res);
            if($res_check>0){
                echo "<p> LOGGED IN SUCCESSGULLY! </p>";
            }
            else{
                echo "<p> INVALID USERNAME/PASSWORD </p>";
            }
        }        
    }
?>