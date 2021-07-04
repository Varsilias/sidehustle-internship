<?php
    session_start();
    require_once '../week2/src/functions.php';

    
    $email = $password = null;
    $emailErr = $passwordErr = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
        if (empty($_POST['email']) || empty($_POST['password'])) {
            if(empty($_POST['email'])) {
                $emailErr = 'Email is required';
                echo $emailErr;
            }
            if(empty($_POST['password'])) {
                $passwordErr = 'Password is required';
                echo $passwordErr;
            }
        } else {
            $email = validateEmail($_POST['email']);
            $password = $_POST['password'];
            checkData($email, $password);
        }
     }

    function checkData($email, $password) {
        if ($email != isset($_SESSION['email']) && $password != isset($_SESSION['password'])) {
            echo $_SESSION['email']. "<br>". $_SESSION['password'];
            echo "Incorrect Email or Password";
        } else {
            $_SESSION['isLoggedIn'] = true;
            die("Welcome {$_SESSION['name']} click <a href='index.php'>here</a> to logout");
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome/js/all.min.js">
    <link rel="stylesheet" href="styles/custom.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 py-5 my-4 bg-white shadow-lg">

                <h5 class="mb-4">Log In</h5>
            
                
                <form action="login.php" method="POST">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="nacheetah@example.com">

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password"  placeholder="••••••••">

                    </div>

                   <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Login</button>
                   </div>
                </form>

                 <div class="py-2 mt-2 btn col-md-12 bg-white">
                    <span class="text-dark text-center"><small>Not registered yet? <a href="../week2/register.php" class="text-info">Sign up</a></small></span>
                </div>

            </div>
        </div>
    </div>
</body>
</html>