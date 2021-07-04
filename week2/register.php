<?php
    session_start();
    // require_once '../week2/src/Database.php';
    require_once '../week2/src/functions.php';

   

    $name = $email = $password = null;
    $nameErr = $emailErr = $passwordErr = $passwordMismatch = '';



    $name = $email = $password = $confirmPassword = '';
    
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         if (!isset($_POST['name']) && empty($_POST['name'])) {
            $nameErr = 'Name is required';
         } else {
            $name = validateName($_POST['name']);
            $_SESSION['name'] = $name;
         }

         
         if (!isset($_POST['email']) && empty($_POST['email'])) {
            $emailErr = 'Email is required';
         } else {
            $email = validateEmail($_POST['email']);
            $_SESSION['email'] = $email;

         }

         if (!isset($_POST['password']) && empty($_POST['password'])) {
            $passwordErr = 'Password is required';
         } else {
            $password = validatePassword($_POST['password'], $_POST['password_confirmation']);
            $_SESSION['password'] = $password;
            $_SESSION['isLoggedIn'] = false;

         }
     }
    
    function checkSessionValues() {
        $check = isset($_SESSION['name'], $_SESSION['email'], $_SESSION['password']);
        return $check;
    }
    

    if(checkSessionValues()) {
        die("You have successfully registered, you can now proceed to <a href='login.php'>Login</a>");
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
    <title>Signup</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 mt-4 py-5 bg-white shadow-lg">

                <h4>Sign Up</h4>

                <form action="register.php" method="POST">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <span class="invalid-feedback alert alert-danger" role="alert">
                            <strong><?php echo $nameErr; ?></strong>
                        </span>
                    </div> 

                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nacheetah@example.com">
                        
                        <span class="invalid-feedback alert alert-danger" role="alert">
                            <strong><?php echo $emailErr; ?></strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" type="password" class="form-control" name="password" placeholder="••••••••">

                        <span class="invalid-feedback alert alert-danger" role="alert">
                            <strong><?php echo $passwordErr?>></strong>
                        </span>

                    </div>

                    
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="••••••••">
                        <span class="invalid-feedback alert alert-danger" role="alert">
                            <strong><?php echo $passwordMismatch?></strong>
                        </span>
                        
                    </div>

                   <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Register</button>
                   </div>
                   
                </form>
                <div class="m-auto">
                    <small class="text-dark text-center">Already registered? <a href="../week2/login.php" class="text-info">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>